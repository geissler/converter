<?php
namespace Geissler\Converter\Standard\CSL;

use Geissler\Converter\Interfaces\ParserInterface;
use Geissler\Converter\Model\Entries;
use Geissler\Converter\Model\Entry;
use Geissler\Converter\Model\Person;
use Geissler\Converter\Model\Date;

/**
 * CSL Parser.
 *
 * @author  Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Parser implements ParserInterface
{
    /** @var \Geissler\Converter\Model\Entries */
    private $entries;
    /** @var \Geissler\Converter\Model\Entry */
    private $entry;

    /**
     * Transfer the csl input data into a \Geissler\Converter\Model\Entries object.
     *
     * @param string $data
     * @return boolean
     */
    public function parse($data)
    {
        $json   =   json_decode($data, true);

        if (is_array($json) == true) {
            $this->entries  =   new Entries();
            $types  =   array(
                'article'                   =>  'setArticle',
                'article-magazine'          =>  'setArticleMagazine',
                'article-newspaper'         =>  'setArticleNewspaper',
                'article-journal'           =>  'setArticleJournal',
                'bill'                      =>  'setBill',
                'book'                      =>  'setBook',
                'broadcast'                 =>  'setBroadcast',
                'chapter'                   =>  'setChapter',
                'dataset'                   =>  'setDataset',
                'entry'                     =>  'setEntry',
                'entry-dictionary'          =>  'setEntryDictionary',
                'entry-encyclopedia'        =>  'setEntryEncyclopedia',
                'figure'                    =>  'setFigure',
                'graphic'                   =>  'setGraphic',
                'interview'                 =>  'setInterview',
                'legislation'               =>  'setLegislation',
                'legal_case'                =>  'setLegalCase',
                'manuscript'                =>  'setManuscript',
                'map'                       =>  'setMap',
                'motion_picture'            =>  'setMotionPicture',
                'musical_score'             =>  'setMusicalScore',
                'pamphlet'                  =>  'setPamphlet',
                'paper-conference'          =>  'setPaperConference',
                'patent'                    =>  'setPatent',
                'post'                      =>  'setPost',
                'post-weblog'               =>  'setPostWeblog',
                'personal_communication'    =>  'setPersonalCommunication',
                'report'                    =>  'setReport',
                'review'                    =>  'setReview',
                'review-book'               =>  'setReviewBook',
                'song'                      =>  'setSong',
                'speech'                    =>  'setSpeech',
                'thesis'                    =>  'setThesis',
                'treaty'                    =>  'setTreaty',
                'webpage'                   =>  'setWebpage'
            );

            $persons        =   array(
                'author'                =>  'getAuthor',
                'collection-editor'     =>  'getCollectionEditor',
                'container-author'      =>  'getContainerAuthor',
                'director'              =>  'getDirector',
                'editor'                =>  'getEditor',
                'editorial-director'    =>  'getEditorialDirector',
                'illustrator'           =>  'getIllustrator',
                'interviewer'           =>  'getInterviewer',
                'original-author'       =>  'getOriginalAuthor',
                'recipient'             =>  'getRecipient',
                'reviewed-author'       =>  'getReviewedAuthor',
                'translator'            =>  'getTranslator'
            );

            $dates  =   array(
                'accessed'      =>  'getAccessed',
                'event-date'    =>  'getEventDate',
                'issued'        =>  'getIssued',
                'original-date' =>  'getOriginalDate',
                'submitted'     =>  'getSubmitted'
            );

            $fields = array(
                'abstract'                    => 'setAbstract',
                'annote'                      => 'setAnnote',
                'archive'                     => 'setArchive',
                'archive_location'            => 'setArchiveLocation',
                'archive-place'               => 'setArchivePlace',
                'authority'                   => 'setAuthority',
                'call-number'                 => 'setCallNumber',
                'citation-label'              => 'setCitationLabel',
                'collection-title'            => 'setCollectionTitle',
                'container-title'             => 'setContainerTitle',
                'container-title-short'       => 'setContainerTitleShort',
                'dimensions'                  => 'setDimensions',
                'DOI'                         => 'setDOI',
                'event'                       => 'setEvent',
                'event-place'                 => 'setEventPlace',
                'genre'                       => 'setGenre',
                'ISBN'                        => 'setISBN',
                'ISSN'                        => 'setISSN',
                'jurisdiction'                => 'setJurisdiction',
                'keyword'                     => 'setKeyword',
                'medium'                      => 'setMedium',
                'note'                        => 'setNote',
                'original-publisher'          => 'setOriginalPublisher',
                'original-publisher-place'    => 'setOriginalPublisherPlace',
                'original-title'              => 'setOriginalTitle',
                'PMCID'                       => 'setPMCID',
                'PMID'                        => 'setPMID',
                'publisher'                   => 'setPublisher',
                'publisher-place'             => 'setPublisherPlace',
                'references'                  => 'setReferences',
                'reviewed-title'              => 'setReviewedTitle',
                'scale'                       => 'setScale',
                'section'                     => 'setSection',
                'source'                      => 'setSource',
                'status'                      => 'setStatus',
                'title'                       => 'setTitle',
                'title-short'                 => 'setTitleShort',
                'URL'                         => 'setURL',
                'version'                     => 'setVersion',
                'yearSuffix'                  => 'setYearSuffix'
            );

            foreach ($json as $record) {
                $this->entry    =   new Entry();

                if (isset($record['type']) == true) {
                    $method =   $types[$record['type']];
                    $this->entry->getType()->$method();
                }

                // persons
                foreach ($persons as $field => $method) {
                    if (isset($record[$field]) == true) {
                        $this->createPerson($record[$field], $method);
                    }
                }

                // dates
                foreach ($dates as $field => $method) {
                    if (isset($record[$field]) == true) {
                        $this->createDate($record[$field], $method);
                    }
                }

                // pages
                if (isset($record['page']) == true) {
                    $this->entry->getPages()->setRange($record['page']);
                }

                if (isset($record['page-first']) == true) {
                    $this->entry->getPages()->setStart($record['page-first']);
                }

                // normal fields
                foreach ($fields as $field => $method) {
                    if (isset($record[$field]) == true) {
                        $this->entry->$method($record[$field]);
                    }
                }

                $this->entries->setEntry($this->entry);
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
     * Create a person object for each csl person and inject it via the given getter-method.
     *
     * @param array $persons
     * @param       $method
     */
    private function createPerson(array $persons, $method)
    {
        $mapper =   array(
            'family'                =>  'setFamily',
            'given'                 =>  'setGiven',
            'dropping-particle'     =>  'setDroppingParticle',
            'non-dropping-particle' =>  'setNonDroppingParticle',
            'suffix'                =>  'setSuffix'
        );

        foreach ($persons as $data) {
            $person   =   new Person();

            foreach ($mapper as $key => $setter) {
                if (isset($data[$key]) == true) {
                    $person->$setter($data[$key]);
                }
            }

            $this->entry->$method()->setPerson($person);
        }
    }

    /**
     * Create a date object for each csl date and inject it via the given getter-method.
     *
     * @param array $dates
     * @param       $method
     */
    private function createDate(array $dates, $method)
    {
        foreach ($dates['date-parts'] as $data) {
            $date   =   new Date();

            if (isset($data[0]) == true) {
                $date->setYear($data[0]);
            } elseif (isset($values['year']) == true) {
                $date->setYear($data['year']);
            }

            if (isset($data[1]) == true
                || isset($data['month']) == true) {
                $month  =   isset($data['month']) == true ? $data['month'] : $data[1];

                if (in_array($month, array(1, 2, 3, 4, 5, 5, 6, 7, 8, 9, 10, 11, 12)) == true) {
                    $date->setMonth($month);
                }
            }

            if (isset($data[2]) == true) {
                $date->setDay($data[2]);
            } elseif (isset($values['day']) == true) {
                $date->setDay($data['day']);
            }

            $this->entry->$method()->setDate($date);
        }
    }
}
