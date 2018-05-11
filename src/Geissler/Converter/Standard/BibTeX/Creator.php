<?php
namespace Geissler\Converter\Standard\BibTeX;

use Geissler\Converter\Interfaces\CreatorInterface;
use Geissler\Converter\Model\Entries;
use Geissler\Converter\Model\Persons;
use Geissler\Converter\Model\Entry;

/**
 * Create bibTeX snippets.
 *
 * @author  Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Creator implements CreatorInterface
{
    /** @var array */
    private $bibTeX;
    /** @var string */
    private $lineBreak = "\r\n";

    /**
     * Create entries based on the given standard from the \Geissler\Converter\Model\Entries object.
     *
     * @param \Geissler\Converter\Model\Entries $data
     * @return boolean
     */
    public function create(Entries $data)
    {
        $this->bibTeX   =   array();

        $mapper =   array(
            'title'             =>  'getTitle',
            'volume'            =>  'getVolume',
            'number'            =>  'getNumber',
            'note'              =>  'getNote',
            'publisher'         =>  'getPublisher',
            'series'            =>  'getCollectionNumber',
            'address'           =>  'getAddress',
            'edition'           =>  'getEdition',
            'isbn'              =>  'getISBN',
            'organization'      =>  'getOrganization',
            'chapter'           =>  'getChapterNumber',
            'school'            =>  'getSchool',
            'booktitle'         =>  'getContainerTitle',
            'journal'           =>  'getJournal',
            'shorttitle'        =>  'getTitleShort',
            'keywords'          =>  'getKeyword',
            'LCCN'              =>  'getCallNumber',
            'url'               =>  'getURL'
        );

        foreach ($data as $entry) {
            /** @var $entry \Geissler\Converter\Model\Entry */
            $data   =   array();
            $data[] =   $this->init($entry);

            // author
            if (count($entry->getAuthor()) > 0) {
                $author =   $this->createPerson($entry->getAuthor());

                if ($author !== false) {
                    $data[] =   'author = {' . $author . '}';
                }
            }

            // editor
            if (count($entry->getEditor()) > 0) {
                $editor =   $this->createPerson($entry->getEditor());

                if ($editor !== false) {
                    $data[] =   'editor = {' . $editor . '}';
                }
            }

            // use issued date for year and month
            foreach ($entry->getIssued() as $date) {
                /** @var $date \Geissler\Converter\Model\Date */
                if ($date->getYear() != '') {
                    $data[] =   'year = {' . $date->getYear() . '}';
                }

                if ($date->getMonth() != '') {
                    $data[] =   'month = {' . $date->getMonth() . '}';
                }
            }

            // pages
            if ($entry->getPages()->getRange() !== null) {
                $data[] =   'pages = {' . $entry->getPages()->getRange() . '}';
            } elseif ($entry->getPages()->getStart() !== null
                && $entry->getPages()->getEnd() !== null) {
                $data[] =   'pages = {' . $entry->getPages()->getStart() . '-' . $entry->getPages()->getEnd() . '}';
            } elseif ($entry->getPages()->getStart() !== null) {
                $data[] =   'pages = {' . $entry->getPages()->getStart() . '}';
            } elseif ($entry->getPages()->getEnd() !== null) {
                $data[] =   'pages = {' . $entry->getPages()->getEnd() . '}';
            } elseif ($entry->getPages()->getTotal() !== null) {
                $data[] =   'pages = {' . $entry->getPages()->getTotal() . '}';
            }

            foreach ($mapper as $field => $method) {
                $value  =   $entry->$method();
                if (is_array($value) == true) {
                    if (count($value) > 0) {
                        $data[]   =   $field . ' = {' . implode(', ', $value) . '}';
                    }
                } elseif ($value != '') {
                    $data[]   =   $field . ' = {' . $value . '}';
                }
            }

            $this->bibTeX[] =   implode(',' . $this->lineBreak, $data) . $this->lineBreak .  '}';
        }

        if (count($this->bibTeX) == 0) {
            return false;
        }

        return true;
    }

    /**
     * Retrieve the created standard data. Return false if standard could not be created.
     *
     * @return string|boolean
     */
    public function retrieve()
    {
        if (isset($this->bibTeX) == true
            && count($this->bibTeX) > 0) {
            return implode($this->lineBreak . $this->lineBreak, $this->bibTeX);
        }

        return false;
    }

    /**
     * Create the bibTeX "header".
     *
     * @param \Geissler\Converter\Model\Entry $entry
     * @return string
     */
    private function init(Entry $entry)
    {
        $type   =   $this->getType($entry->getType()->getType());
        $return =   '@' . $type . '{';

        if ($entry->getCitationLabel() !== null) {
            $return .=  $entry->getCitationLabel();
        } else {
            $return .= $type;
        }

        return $return;
    }

    /**
     * Retrieve the bibTeX type.
     *
     * @param string $type
     * @return string
     */
    private function getType($type)
    {
        switch ($type) {
            case 'article':
            case 'articleJournal':
            case 'articleMagazine':
            case 'articleNewspaper':
                return 'article';
            case 'manual':
                return 'book';
            case 'chapter':
                return 'inbook';
            case 'paperConference':
                return 'inproceedings';
            case 'thesis':
                return 'phdthesis';
            case 'pamphlet':
                return 'booklet';
            case 'report':
                return 'techreport';
            case 'manuscript':
                return 'unpublished';
            default:
                return $type;
        }
    }

    /**
     * Create a string of persons (particle (like von, van) family-name, given name suffix (like jr) separated by "and".
     *
     * @param \Geissler\Converter\Model\Persons $persons
     * @return string|boolean
     */
    private function createPerson(Persons $persons)
    {
        $return =   array();

        foreach ($persons as $person) {
            /** @var $person \Geissler\Converter\Model\Person */
            $name   =   implode(
                ' ',
                array(
                    $person->getDroppingParticle(),
                    $person->getFamily() . ', ',
                    $person->getGiven(),
                    $person->getSuffix()
                )
            );

            if ($name !== ' ,   ') {
                $return[]   =   trim(str_replace('  ', ' ', $name));
            }
        }

        if (count($return) == 0) {
            return false;
        }

        return implode(' and ', $return);
    }
}
