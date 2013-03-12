<?php
namespace Geissler\Converter\Standard\RIS;

use Geissler\Converter\Interfaces\CreatorInterface;
use Geissler\Converter\Model\Entries;
use Geissler\Converter\Model\Persons;
use Geissler\Converter\Model\Date;
use Geissler\Converter\Model\Person;
use LibRIS\RISWriter;

/**
 * Create RIS records.
 *
 * @author  Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Creator implements CreatorInterface
{
    /** @var array */
    private $data;

    /**
     * Create entries based on the given standard from the \Geissler\Converter\Model\Entries object.
     *
     * @param \Geissler\Converter\Model\Entries $data
     * @return boolean
     */
    public function create(Entries $data)
    {
        if (count($data) > 0) {
            $this->data =   array();

            $authors    =   array(
                //'A1'    =>  'getAuthor',
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
                'N2'    => 'getAbstract',
                'ID '   => 'getCitationLabel',
                'JA'    => 'getCollectionTitle',
                'JF'    => 'getContainerTitle',
                'JO'    => 'getContainerTitleShort',
                'SN'    => 'getISBN',
                'N1'    => 'getNote',
                'PB'    => 'getPublisher',
                'CY'    => 'getPublisherPlace',
                'T1'    => 'getTitle',
                'T2'    => 'getContainerTitle',
                'TI'    => 'getTitle',
                'TT'    => 'getOriginalTitle',
                'CT'    => 'getTitle',
                'UR'    => 'getURL',
                'VL'    => 'getVolume',
                'IS'    => 'getIssue',
                'T2'    => 'getTitleSecondary',
                'L1'    => 'getPdf',
                'L2 '   => 'getFullText',
                'DB'    => 'getDatabase',
                'DO'    => 'getDOI',
                'ET'    => 'getEdition',
                'LA'    => 'getLanguage',
                'LB'    => 'getLabel',
                'NV'    => 'getNumberOfVolumes',
                'RI'    => 'getReviewedTitle',
                'SE'    => 'getVersion',
                'ST'    => 'getTitleShort',
                'RP'    => 'getReprintEdition',
                'KW'    => 'getKeyword'
            );

            $identical  =   array(
                'T1'    =>  array('TI', 'CT'),
                'PY'    =>  array('Y1')
            );
            
            foreach ($data as $entry) {
                /** @var $entry \Geissler\Converter\Model\Entry */
                $record =   array();

                // type
                $record['TY']   =   array($this->getType($entry->getType()->getType()));

                // authors
                foreach ($authors as $field => $method) {
                    if (count($entry->$method()) > 0) {
                        $record[$field] =   array();
                        foreach ($entry->$method() as $person) {
                            /** @var $person \Geissler\Converter\Model\Person */
                            $record[$field][]   =   $this->getPerson($person);
                        }
                    }
                }

                // dates
                foreach ($dates as $field => $method) {
                    if (count($entry->$method()) > 0) {
                        $date           =   $entry->$method();
                        $record[$field] =   array($this->getDate($date[0]));
                    }
                }

                // pages
                if ($entry->getPages()->getRange() !== null) {
                    $record['SP']   =   array($entry->getPages()->getRange());
                } elseif ($entry->getPages()->getStart() !== null
                    && $entry->getPages()->getEnd() !== null) {
                    $record['SP']   =   array($entry->getPages()->getStart());
                    $record['EP']   =   array($entry->getPages()->getEnd());
                } elseif ($entry->getPages()->getStart() !== null) {
                    $record['SP']   =   array($entry->getPages()->getStart());
                } elseif ($entry->getPages()->getEnd() !== null) {
                    $record['EP']   =   array($entry->getPages()->getEnd());
                } elseif ($entry->getPages()->getTotal() !== null) {
                    $record['SP']   =   array($entry->getPages()->getTotal());
                }

                // field
                foreach ($fields as $field => $getter) {
                    $value  =   $entry->$getter();
                    if ($value !== null) {
                        if (is_array($value) == true) {
                            $record[$field] =   $value;
                        } else {
                            $record[$field] =   array($value);
                        }
                    }
                }

                // remove identical values
                foreach ($identical as $main => $secondary) {
                    if (isset($record[$main][0]) == true) {
                        $value  =   $record[$main][0];
                        foreach ($secondary as $secondaryField) {
                            if (isset($record[$secondaryField][0]) == true
                                && $record[$secondaryField][0] == $value) {
                                unset($record[$secondaryField][0]);
                            }
                        }
                    }

                }

                $this->data[]   =   $record;
            }

            return true;
        }

        return false;
    }

    /**
     * Retrieve the created standard data. Return false if standard could not be created.
     *
     * @return string|boolean
     */
    public function retrieve()
    {
        if (isset($this->data) == true
            && count($this->data) > 0) {
            $writer =   new RISWriter();

            return $writer->writeRecords($this->data);
        }

        return false;
    }

    /**
     * Retrieve the type of literature.
     *
     * @param string $type
     * @return string
     */
    private function getType($type)
    {
        switch ($type) {
            case 'abstract':
                return 'ABST';
            case 'motionPicture':
                return 'MPCT';
            case 'graphic':
                return 'ART';
            case 'bill':
                return 'BILL';
            case 'book':
                return 'BOOK';
            case 'legalCase':
                return 'CASE';
            case 'chapter':
                return 'CHAP';
            case 'articleJournal':
                return 'JOUR';
            case 'catalog':
                return 'CTLG';
            case 'dataset':
                return 'DATA';
            case 'webpage':
                return 'ELEC';
            case 'articleMagazine':
                return 'MGZN';
            case 'musicalScore':
                return 'MUSIC';
            case 'articleNewspaper':
                return 'NEWS';
            case 'pamphlet':
                return 'PAMP';
            case 'personalCommunication':
                return 'PCOMM';
            case 'report':
                return 'RPRT';
            case 'Thesis':
                return 'THES';
            case 'manuscript':
                return 'UNPB';
            case 'patent':
                return 'PAT';
            case 'video':
                return 'VIDEO';
            case 'software':
                return 'COMP';
            case 'map':
                return 'MAP';
            case 'slide':
                return 'SLIDE';
            default:
                return 'BOOK';
        }
    }

    /**
     * Transfer a \Geissler\Converter\Model\Date object into a date string.
     *
     * @param \Geissler\Converter\Model\Date $date
     * @return int|string
     */
    private function getDate(Date $date)
    {
        if ($date->getYear() == null) {
            return '';
        }

        $return =   $date->getYear();

        if ($date->getDay() !== null
            && $date->getMonth() !== null) {
            $return .=  '/' . $date->getMonth() . '/' . $date->getDay();
        } elseif ($date->getMonth() !== null) {
            $return .=  '/' . $date->getMonth();
        }

        if ($date->getSeason() !== null) {
            $return .= '/';

            if ($date->getMonth() === null) {
                $return .= '/';
            }

            if ($date->getDay() == null) {
                $return .= '/';
            }

            return $return . $date->getSeason();
        }

        return $return;
    }

    /**
     * Transfer a \Geissler\Converter\Model\Person object into a person string (Lastname, Firstname, Suffix).
     *
     * @param \Geissler\Converter\Model\Person $person
     * @return string
     */
    private function getPerson(Person $person)
    {
        $return =   array($person->getFamily());

        if ($person->getGiven() !== '') {
            $return[]   =   $person->getGiven();
        }

        if ($person->getSuffix() !== '') {
            $return[]   =   $person->getSuffix();
        }

        return implode(', ', $return);
    }
}
