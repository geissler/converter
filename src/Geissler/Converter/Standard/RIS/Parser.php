<?php
namespace Geissler\Converter\Standard\RIS;

use Geissler\Converter\Interfaces\ParserInterface;
use Geissler\Converter\Model\Entries;
use Geissler\Converter\Model\Entry;
use Geissler\Converter\Model\Person;
use Geissler\Converter\Model\Date;
use LibRIS\RISReader;

/**
 * Parse a RIS record format.
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
        $reader =   new \LibRIS\RISReader();
        $reader->parseString($data);
        $records    =   $reader->getRecords();

        if (is_array($records) === true
            && count($records) > 0) {
            $this->entries  =   new Entries();

            $authors    =   array(
                'A1'    =>  'getAuthor',
                'A2'    =>  'getEditor',
                'A4'    =>  'getTranslator',
                'AU'    =>  'getAuthor',
                'TA'    =>  'getOriginalAuthor'
            );

            $dates  =   array(
                'Y1'    =>  'getIssued',
                'PY'    =>  'getIssued',
                'Y2'    =>  'getAccessed'
            );

            $fields = array(
                'N2'    => 'setAbstract',
                'ID '   => 'setCitationLabel',
                'JA'    => 'setCollectionTitle',
                'JF'    => 'setContainerTitle',
                'JO'    => 'setContainerTitleShort',
                'J1'    => 'setContainerTitleShort',
                'J2'    => 'setContainerTitleShort',
                'SN'    => 'setISBN',
                'N1'    => 'setNote',
                'PB'    => 'setPublisher',
                'CY'    => 'setPublisherPlace',
                'T1'    => 'setTitle',
                'TI'    => 'setTitle',
                'TT'    => 'setOriginalTitle',
                'CT'    => 'setTitle',
                'UR'    => 'setURL',
                'VL'    => 'setVolume',
                'IS'    => 'setIssue',
                'T2'    => 'setTitleSecondary',
                'L1'    => 'setPdf',
                'L2 '   => 'setFullText',
                'DB'    => 'setDatabase',
                'DO'    => 'setDOI',
                'ET'    => 'setEdition',
                'LA'    => 'setLanguage',
                'LB'    => 'setLabel',
                'NV'    => 'setNumberOfVolumes',
                'RI'    => 'setReviewedTitle',
                'SE'    => 'setVersion',
                'ST'    => 'setTitleShort',
                'RP'    => 'setReprintEdition'
            );

            foreach ($records as $record) {
                $entry  =   $this->getType(new Entry(), $record['TY'][0]);

                // authors
                foreach ($authors as $author => $method) {
                    if (isset($record[$author]) == true) {
                        foreach ($record[$author] as $value) {
                            $entry->$method()->setPerson($this->getPerson($value));
                        }
                    }
                }

                // pages
                if (isset($record['SP'][0]) == true) {
                    $entry->getPages()->setStart($record['SP'][0]);
                }

                if (isset($record['EP'][0]) == true) {
                    $entry->getPages()->setEnd($record['EP'][0]);
                }

                // dates
                foreach ($dates as $date => $method) {
                    if (isset($record[$date][0]) == true) {
                        $entry->$method()->setDate($this->getDate($record[$date][0]));
                    }
                }

                // keywords
                if (isset($record['KW']) == true) {
                    $entry->setKeyword(implode(', ', $record['KW']));
                }

                // fields
                foreach ($fields as $field => $setter) {
                    if (isset($record[$field][0]) == true
                        && $record[$field][0] != '') {
                        $entry->$setter($record[$field][0]);
                    }
                }

                $this->entries->setEntry($entry);
            }

            return true;
        }

        return false;
    }

    /**
     * Retrieve the \Geissler\Converter\Model\Entries object containing the parsed data.
     *
     * @throws \ErrorException when no entries object is set.
     *
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
     * Retrieve the type of record.
     *
     * @param \Geissler\Converter\Model\Entry $entry
     * @param  string                         $type
     * @return \Geissler\Converter\Model\Entry
     */
    private function getType(Entry $entry, $type)
    {
        switch ($type) {
            case 'ABST':
                $entry->getType()->setAbstract();
                break;
            case 'ADVS':
            case 'MPCT':
                $entry->getType()->setMotionPicture();
                break;
            case 'ART':
                $entry->getType()->setGraphic();
                break;
            case 'BILL':
            case 'UNBILl':
                $entry->getType()->setBill();
                break;
            case 'BOOK':
            case 'SER':
                $entry->getType()->setBook();
                break;
            case 'CASE':
                $entry->getType()->setLegalCase();
                break;
            case 'CHAP':
                $entry->getType()->setChapter();
                break;
            case 'JFULL':
            case 'JOUR':
                $entry->getType()->setArticleJournal();
                break;
            case 'CTLG':
                $entry->getType()->setCatalog();
                break;
            case 'DATA':
                $entry->getType()->setDataset();
                break;
            case 'ELEC':
                $entry->getType()->setWebpage();
                break;
            case 'MGZN':
                $entry->getType()->setArticleMagazine();
                break;
            case 'MUSIC':
            case 'SOUND':
                $entry->getType()->setMusicalScore();
                break;
            case 'NEWS':
                $entry->getType()->setArticleNewspaper();
                break;
            case 'PAMP':
                $entry->getType()->setPamphlet();
                break;
            case 'PCOMM':
                $entry->getType()->setPersonalCommunication();
                break;
            case 'RPRT':
                $entry->getType()->setReport();
                break;
            case 'THES':
                $entry->getType()->setThesis();
                break;
            case 'UNPB':
                $entry->getType()->setManuscript();
                break;
            case 'PAT':
                $entry->getType()->setPatent();
                break;
            case 'VIDEO':
                $entry->getType()->setVideo();
                break;
            case 'COMP':
                $entry->getType()->setSoftware();
                break;
            case 'MAP':
                $entry->getType()->setMap();
                break;
            case 'SLIDE':
                $entry->getType()->setSlide();
                break;
            default:
                $entry->getType()->setUnknown();
                break;
        }

        return $entry;
    }

    /**
     * Parse a date into a \Geissler\Converter\Model\Date object.
     *
     * @param string $data
     * @return \Geissler\Converter\Model\Date
     */
    private function getDate($data)
    {
        $date   =   new Date();

        if (preg_match('/^([0-9]){4}$/', $data) == 1) {
            $date->setYear($data);
        } elseif (preg_match('/^([0-9]{4})\/([0-9][0-9])\/([0-9][0-9])$/', $data, $match) == 1) {
            $date
                ->setYear($match[1])
                ->setMonth($match[2])
                ->setDay($match[3]);
        } elseif (preg_match('/^([0-9]{4})\/([0-9][0-9])\/\/$/', $data, $match) == 1) {
            $date
                ->setYear($match[1])
                ->setMonth($match[2]);
        }

        return $date;
    }

    /**
     * Parse a person into a \Geissler\Converter\Model\Person object.
     *
     * @param string $data
     * @return \Geissler\Converter\Model\Person
     */
    private function getPerson($data)
    {
        $person =   new Person();
        $values =   explode(',', $data);

        $person
            ->setFamily(trim($values[0]))
            ->setGiven(trim($values[1]));

        if (isset($values[2]) == true) {
            $person->setSuffix(trim($values[2]));
        }

        return $person;
    }
}
