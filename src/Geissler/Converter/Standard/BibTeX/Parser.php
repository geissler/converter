<?php
namespace Geissler\Converter\Standard\BibTeX;

use Geissler\Converter\Interfaces\ParserInterface;
use Geissler\Converter\Model\Entries;
use Geissler\Converter\Model\Entry;
use Geissler\Converter\Model\Person;
use Geissler\Converter\Model\Date;

/**
 * Transfer one ore multiple BibTex entries in objects of class Geissler\Converter\Model\Entry.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Parser implements ParserInterface
{
    /** @var \Geissler\Converter\Model\Entries */
    private $entries;

    /**
     * Transfer the data from a standard into a \Geissler\Converter\Model\Entries object.
     *
     * @param string $data
     * @return boolean
     */
    public function parse($data)
    {
        $bibTeX =   $this->extract($data);

        if (count($bibTeX) > 0) {
            $this->create($bibTeX);
            return true;
        }

        return false;
    }

    /**
     * Retrieve the \Geissler\Converter\Model\Entries object containing the parsed data.
     *
     * @throws \ErrorException when no entries object is set.
     * @return \Geissler\Converter\Model\Entries
     */
    public function retrieve()
    {
        if (isset($this->entries) == true) {
            return $this->entries;
        }

        throw new \ErrorException('No entries object created!');
    }

    /**
     * Extract the BibTeX data.
     *
     * @param string $data
     * @return array
     */
    private function extract($data)
    {
        $data   =   trim($data) . "\n";
        $parser =   new \PARSEENTRIES();
        $parser->expandMacro    =   true;
        $parser->removeDelimit  =   true;
        $parser->loadBibtexString($data);
        $parser->extractEntries();
        $bibTeX =   $parser->returnArrays();
        $bibTeX =   $bibTeX[2];

        $length =   count($bibTeX);
        $author =   new \PARSECREATORS();
        $date   =   new \PARSEMONTH();
        $page   =   new \PARSEPAGE();
        for ($i = 0; $i < $length; $i++) {
            if (isset($bibTeX[$i]['author']) == true) {
                $bibTeX[$i]['author']   =   $author->parse($bibTeX[$i]['author']);
            }

            if (isset($bibTeX[$i]['editor']) == true) {
                $bibTeX[$i]['editor']   =   $author->parse($bibTeX[$i]['editor']);
            }

            if (isset($bibTeX[$i]['month']) == true) {
                $bibTeX[$i]['month']   =   $date->init($bibTeX[$i]['month']);
            }

            if (isset($bibTeX[$i]['pages']) == true
                && $bibTeX[$i]['pages'] != ''
                && preg_match('/^[0-9]+$/', $bibTeX[$i]['pages']) == 0) {
                $bibTeX[$i]['pages']   =   $page->init($bibTeX[$i]['pages']);
            }
        }

        return $bibTeX;
    }

    /**
     * Write the data into Geissler\Converter\Model\Entry objects.
     *
     * @param array $data
     */
    private function create(array $data)
    {
        $this->entries  =   new Entries();

        $length =   count($data);
        for ($i = 0; $i < $length; $i++) {
            $entry  =   new Entry();

            switch ($data[$i]['bibtexEntryType']) {
                case 'article':
                    $entry->getType()->setArticle();
                    break;
                case 'book':
                case 'manual':
                    $entry->getType()->setBook();
                    break;
                case 'conference':
                    $entry->getType()->setConference();
                    break;
                case 'inbook':
                case 'incollection':
                    $entry->getType()->setChapter();
                    break;
                case 'inproceedings':
                case 'proceedings':
                    $entry->getType()->setPaperConference();
                    break;
                case 'mastersthesis':
                case 'phdthesis':
                    $entry->getType()->setThesis();
                    break;
                case 'booklet':
                    $entry->getType()->setPamphlet();
                    break;
                case 'techreport':
                    $entry->getType()->setReport();
                    break;
                case 'unpublished':
                    $entry->getType()->setManuscript();
                    break;
                default:
                    $entry->getType()->setUnknown();
                    break;
            }

            // author
            if (isset($data[$i]['author']) == true) {
                $entry  =   $this->createPersons($entry, $data[$i]['author'], 'getAuthor');
            }

            // editor
            if (isset($data[$i]['editor']) == true) {
                $entry  =   $this->createPersons($entry, $data[$i]['editor'], 'getEditor');
            }

            // set dates as issued date
            $issued =   new Date();
            if (isset($data[$i]['year']) == true) {
                $issued->setYear($data[$i]['year']);
            }

            if (isset($data[$i]['month']) == true) {
                if (is_array($data[$i]['month']) == true) {
                    // a date containing a month and a day is set
                    if ($data[$i]['month'][0] !== false) {
                        // two dates are used
                        $start  =   new Date();
                        $start
                            ->setYear($issued->getYear())
                            ->setMonth($data[$i]['month'][0]);

                        if ($data[$i]['month'][1] !== false) {
                            $start->setDay($data[$i]['month'][1]);
                        }

                        $entry->getIssued()->setDate($start);
                    }

                    // one date
                    if ($data[$i]['month'][2] !== false) {
                        $issued->setMonth($data[$i]['month'][2]);
                    } elseif ($data[$i]['month'][1] !== false) {
                        $issued->setMonth($data[$i]['month'][1]);
                    }

                    if ($data[$i]['month'][3] !== false) {
                        $issued->setDay($data[$i]['month'][3]);
                    }
                } else {
                    // only one number set
                    $issued->setMonth($data[$i]['month']);
                }
            }
            $entry->getIssued()->setDate($issued);

            // pages
            if (isset($data[$i]['pages']) == true) {
                if (is_array($data[$i]['pages']) == true) {
                    if (isset($data[$i]['pages'][0]) == true) {
                        $entry->getPages()->setStart($data[$i]['pages'][0]);
                    }

                    if (isset($data[$i]['pages'][1]) == true) {
                        $entry->getPages()->setEnd($data[$i]['pages'][1]);
                    }
                } elseif ($data[$i]['pages'] != '') {
                    $entry->getPages()->setTotal($data[$i]['pages']);
                }
            }

            $mapper =   array(
                'title'             =>  'setTitle',
                'abstract'          =>  'setAbstract',
                'volume'            =>  'setVolume',
                'number'            =>  'setNumber',
                'note'              =>  'setNote',
                'publisher'         =>  'setPublisher',
                'series'            =>  'setCollectionNumber',
                'address'           =>  'setAddress',
                'edition'           =>  'setEdition',
                'isbn'              =>  'setISBN',
                'organization'      =>  'setOrganization',
                'chapter'           =>  'setChapterNumber',
                'school'            =>  'setSchool',
                'booktitle'         =>  'setContainerTitle',
                'journal'           =>  'setJournal',
                'bibtexCitation'    =>  'setCitationLabel',
                'shorttitle'        =>  'setTitleShort',
                'keywords'          =>  'setKeyword',
                'LCCN'              =>  'setCallNumber'
            );

            foreach ($mapper as $key => $method) {
                if (isset($data[$i][$key]) == true
                    && $data[$i][$key] != '') {
                    $entry->$method($data[$i][$key]);
                }
            }

            $this->entries->setEntry($entry);
        }
    }

    /**
     * Add a person (Geissler\Converter\Model\Person object) to a person collection (Geissler\Converter\Model\Persons).
     *
     * @param \Geissler\Converter\Model\Entry $entry
     * @param array $persons Persons extracted from the BibTeX
     * @param string $setter Setter method to inject each person, e.g. getAuthor
     * @return \Geissler\Converter\Model\Entry
     */
    private function createPersons(Entry $entry, $persons, $setter)
    {
        $length    =   count($persons);

        for ($j = 0; $j < $length; $j++) {
            $author =   new Person();
            $author
                ->setGiven($persons[$j][0])
                ->setFamily($persons[$j][2])
                ->setNonDroppingParticle($persons[$j][3])
                ->setDroppingParticle($persons[$j][3]);

            if ($persons[$j][0] == '') {
                $author->setGiven($persons[$j][1]);
            } else {
                $author->setSuffix($persons[$j][1]);
            }

            $entry->$setter()->setPerson($author);
        }

        return $entry;
    }
}
