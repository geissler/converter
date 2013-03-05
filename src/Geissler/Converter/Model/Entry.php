<?php
namespace Geissler\Converter\Model;

use Geissler\Converter\Model\Persons;
use Geissler\Converter\Model\Type;
use Geissler\Converter\Model\Dates;

/**
 * The basic mapping class
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Entry
{
    /** @var \Geissler\Converter\Model\Type */
    private $type;
    /** @var \Geissler\Converter\Model\Persons */
    private $author;
    /** @var \Geissler\Converter\Model\Persons */
    private $editor;
    /** @var \Geissler\Converter\Model\Persons */
    private $collectionEditor;
    /** @var \Geissler\Converter\Model\Persons */
    private $composer;
    /** @var \Geissler\Converter\Model\Persons */
    private $containerAuthor;
    /** @var \Geissler\Converter\Model\Persons */
    private $director;
    /** @var \Geissler\Converter\Model\Persons */
    private $editorialDirector;
    /** @var \Geissler\Converter\Model\Persons */
    private $illustrator;
    /** @var \Geissler\Converter\Model\Persons */
    private $interviewer;
    /** @var \Geissler\Converter\Model\Persons */
    private $originalAuthor;
    /** @var \Geissler\Converter\Model\Persons */
    private $recipient;
    /** @var \Geissler\Converter\Model\Persons */
    private $reviewedAuthor;
    /** @var \Geissler\Converter\Model\Persons */
    private $translator;
    /** @var string */
    private $citationLabel;
    private $abstract;
    private $annote;
    private $archiveLocation;
    private $archivePlace;
    private $authority;
    private $callNumber;
    private $label;
    private $collectionTitle;
    /** @var string */
    private $containerTitle;
    private $containerTitleShort;
    private $dimensions;
    private $DOI;
    private $event;
    private $eventPlace;
    private $firstReferenceNoteNumber;
    private $genre;
    private $ISBN;
    private $ISSN;
    private $jurisdiction;
    private $keyword;
    private $locator;
    private $medium;
    private $note;
    private $originalPublisher;
    private $originalPublisherPlace;
    private $originalTitle;
    private $page;
    private $pageFirst;
    private $PMCID;
    private $PMID;
    private $publisher;
    private $publisherPlace;
    private $references;
    private $reviewedTitle;
    private $scale;
    private $section;
    private $source;
    private $status;
    private $title;
    private $titleShort;
    private $titleSecondary;
    private $URL;
    private $version;
    private $yearSuffix;
    private $chapterNumber;
    private $collectionNumber;
    private $edition;
    private $issue;
    private $number;
    private $numberOfPages;
    private $numberOfVolumes;
    /** @var string */
    private $journal;
    /** @var string */
    private $journalShort;
    /** @var string */
    private $address;
    /** @var string */
    private $organization;
    /** @var int|string */
    private $volume;
    /** @var string */
    private $school;
    /** @var \Geissler\Converter\Model\Dates */
    private $accessed;
    /** @var \Geissler\Converter\Model\Dates */
    private $eventDate;
    /** @var \Geissler\Converter\Model\Dates */
    private $issued;
    /** @var \Geissler\Converter\Model\Dates */
    private $originalDate;
    /** @var \Geissler\Converter\Model\Dates */
    private $submitted;

    public function __construct()
    {
        $this->type                 =   new Type();
        $this->author               =   new Persons();
        $this->editor               =   new Persons();
        $this->collectionEditor     =   new Persons();
        $this->composer             =   new Persons();
        $this->containerAuthor      =   new Persons();
        $this->director             =   new Persons();
        $this->editorialDirector    =   new Persons();
        $this->illustrator          =   new Persons();
        $this->interviewer          =   new Persons();
        $this->originalAuthor       =   new Persons();
        $this->recipient            =   new Persons();
        $this->reviewedAuthor       =   new Persons();
        $this->translator           =   new Persons();
        $this->accessed             =   new Dates();
        $this->eventDate            =   new Dates();
        $this->issued               =   new Dates();
        $this->originalDate         =   new Dates();
        $this->submitted            =   new Dates();
    }

    public function setDOI($DOI)
    {
        $this->DOI = $DOI;
        return $this;
    }

    public function getDOI()
    {
        return $this->DOI;
    }

    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
        return $this;
    }

    public function getISBN()
    {
        return $this->ISBN;
    }

    public function setISSN($ISSN)
    {
        $this->ISSN = $ISSN;
        return $this;
    }

    public function getISSN()
    {
        return $this->ISSN;
    }

    public function setPMCID($PMCID)
    {
        $this->PMCID = $PMCID;
        return $this;
    }

    public function getPMCID()
    {
        return $this->PMCID;
    }

    public function setPMID($PMID)
    {
        $this->PMID = $PMID;
        return $this;
    }

    public function getPMID()
    {
        return $this->PMID;
    }

    public function setURL($URL)
    {
        $this->URL = $URL;
        return $this;
    }

    public function getURL()
    {
        return $this->URL;
    }

    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
        return $this;
    }

    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * @return \Geissler\Converter\Model\Dates
     */
    public function getAccessed()
    {
        return $this->accessed;
    }

    /**
     * Address of the author or editor, e.g. name of the university and department.
     *
     * @param string $address
     * @return \Geissler\Converter\Model\Entry
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * Address of the author or editor, e.g. name of the university and department.
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }


    public function setAnnote($annote)
    {
        $this->annote = $annote;
        return $this;
    }

    public function getAnnote()
    {
        return $this->annote;
    }

    public function setArchiveLocation($archiveLocation)
    {
        $this->archiveLocation = $archiveLocation;
        return $this;
    }

    public function getArchiveLocation()
    {
        return $this->archiveLocation;
    }

    public function setArchivePlace($archivePlace)
    {
        $this->archivePlace = $archivePlace;
        return $this;
    }

    public function getArchivePlace()
    {
        return $this->archivePlace;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getAuthor()
    {
        return $this->author;
    }

    public function getAuthority()
    {
        return $this->authority;
    }

    public function setCallNumber($callNumber)
    {
        $this->callNumber = $callNumber;
        return $this;
    }

    public function getCallNumber()
    {
        return $this->callNumber;
    }

    public function setChapterNumber($chapterNumber)
    {
        $this->chapterNumber = $chapterNumber;
        return $this;
    }

    public function getChapterNumber()
    {
        return $this->chapterNumber;
    }

    /**
     * A label to identify a literature entry (cite) in a citation, e. g. Ross1 in a BibTeX entry starting with
     * @Book{Ross1,
     *      author = {Ross Taylor, Lily},
     *      title = {{Local Cults in Etruria}},
     *
     * @param string $citationLabel
     *
     * @return \Geissler\Converter\Model\Entry
     */
    public function setCitationLabel($citationLabel)
    {
        $this->citationLabel = $citationLabel;

        return $this;
    }

    /**
     * A label to identify a literature entry (cite) in a citation, e. g. Ross1 in a BibTeX entry starting with
     * @Book{Ross1,
     *      author = {Ross Taylor, Lily},
     *      title = {{Local Cults in Etruria}},
     *
     * @return string
     */
    public function getCitationLabel()
    {
        return $this->citationLabel;
    }


    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getCollectionEditor()
    {
        return $this->collectionEditor;
    }

    public function setCollectionNumber($collectionNumber)
    {
        $this->collectionNumber = $collectionNumber;
        return $this;
    }

    public function getCollectionNumber()
    {
        return $this->collectionNumber;
    }

    public function setCollectionTitle($collectionTitle)
    {
        $this->collectionTitle = $collectionTitle;
        return $this;
    }

    public function getCollectionTitle()
    {
        return $this->collectionTitle;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getContainerAuthor()
    {
        return $this->containerAuthor;
    }

    /**
     * The name of a journal for a journal article or magazine, the title for a book chapter or an article in a book.
     *
     * @param string $containerTitle
     * @return Entry
     */
    public function setContainerTitle($containerTitle)
    {
        $this->containerTitle = $containerTitle;
        return $this;
    }

    public function getContainerTitle()
    {
        return $this->containerTitle;
    }

    public function setContainerTitleShort($containerTitleShort)
    {
        $this->containerTitleShort = $containerTitleShort;
        return $this;
    }

    public function getContainerTitleShort()
    {
        return $this->containerTitleShort;
    }

    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getDirector()
    {
        return $this->director;
    }

    public function setEdition($edition)
    {
        $this->edition = $edition;
        return $this;
    }

    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getEditorialDirector()
    {
        return $this->editorialDirector;
    }

    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @return \Geissler\Converter\Model\Dates
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    public function setEventPlace($eventPlace)
    {
        $this->eventPlace = $eventPlace;
        return $this;
    }

    public function getEventPlace()
    {
        return $this->eventPlace;
    }

    public function setFirstReferenceNoteNumber($firstReferenceNoteNumber)
    {
        $this->firstReferenceNoteNumber = $firstReferenceNoteNumber;
        return $this;
    }

    public function getFirstReferenceNoteNumber()
    {
        return $this->firstReferenceNoteNumber;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getIllustrator()
    {
        return $this->illustrator;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getInterviewer()
    {
        return $this->interviewer;
    }

    public function setIssue($issue)
    {
        $this->issue = $issue;
        return $this;
    }

    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * @return \Geissler\Converter\Model\Dates
     */
    public function getIssued()
    {
        return $this->issued;
    }

    /**
     * The full name of a journal containing an article.
     *
     * @param string $journal
     * @return \Geissler\Converter\Model\Entry
     */
    public function setJournal($journal)
    {
        $this->journal = $journal;

        return $this;
    }

    /**
     * The full name of a journal containing an article.
     *
     * @return string
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * The abbreviation of the journal name containing an article.
     *
     * @param string $journalShort
     * @return \Geissler\Converter\Model\Entry
     */
    public function setJournalShort($journalShort)
    {
        $this->journalShort = $journalShort;

        return $this;
    }

    /**
     * The abbreviation of the journal name containing an article.
     *
     * @return string
     */
    public function getJournalShort()
    {
        return $this->journalShort;
    }

    public function setJurisdiction($jurisdiction)
    {
        $this->jurisdiction = $jurisdiction;
        return $this;
    }

    public function getJurisdiction()
    {
        return $this->jurisdiction;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
        return $this;
    }

    public function getKeyword()
    {
        return $this->keyword;
    }

    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function setLocator($locator)
    {
        $this->locator = $locator;
        return $this;
    }

    public function getLocator()
    {
        return $this->locator;
    }

    public function setMedium($medium)
    {
        $this->medium = $medium;
        return $this;
    }

    public function getMedium()
    {
        return $this->medium;
    }

    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    public function getNote()
    {
        return $this->note;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumberOfPages($numberOfPages)
    {
        $this->numberOfPages = $numberOfPages;
        return $this;
    }

    public function getNumberOfPages()
    {
        return $this->numberOfPages;
    }

    public function setNumberOfVolumes($numberOfVolumes)
    {
        $this->numberOfVolumes = $numberOfVolumes;
        return $this;
    }

    public function getNumberOfVolumes()
    {
        return $this->numberOfVolumes;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getOriginalAuthor()
    {
        return $this->originalAuthor;
    }

    /**
     * @return \Geissler\Converter\Model\Dates
     */
    public function getOriginalDate()
    {
        return $this->originalDate;
    }

    public function setOriginalPublisher($originalPublisher)
    {
        $this->originalPublisher = $originalPublisher;
        return $this;
    }

    public function getOriginalPublisher()
    {
        return $this->originalPublisher;
    }

    public function setOriginalPublisherPlace($originalPublisherPlace)
    {
        $this->originalPublisherPlace = $originalPublisherPlace;
        return $this;
    }

    public function getOriginalPublisherPlace()
    {
        return $this->originalPublisherPlace;
    }

    public function setOriginalTitle($originalTitle)
    {
        $this->originalTitle = $originalTitle;
        return $this;
    }

    public function getOriginalTitle()
    {
        return $this->originalTitle;
    }

    /**
     * Name of an organization responsible for an conference etc.
     *
     * @param string $organization
     * @return \Geissler\Converter\Model\Entry
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
        return $this;
    }

    /**
     * Name of an organization responsible for an conference etc.
     *
     * @return string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * The number of pages in a book or a range of pages for an article in a journal. Ranges of pages should be set as
     * array containing the first and the last page.
     *
     * @param integer|string|array $page
     * @return Entry
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * The number of pages in a book or a range of pages for an article in a journal. Ranges of pages should be set as
     * array containing the first and the last page.
     *
     * @return integer|string|array
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * The first page of the range of pages.
     *
     * @param integer|string $pageFirst
     * @return Entry
     */
    public function setPageFirst($pageFirst)
    {
        $this->pageFirst = $pageFirst;
        return $this;
    }

    /**
     * The first page of the range of pages.
     *
     * @return integer|string
     */
    public function getPageFirst()
    {
        return $this->pageFirst;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisherPlace($publisherPlace)
    {
        $this->publisherPlace = $publisherPlace;
        return $this;
    }

    public function getPublisherPlace()
    {
        return $this->publisherPlace;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    public function setReferences($references)
    {
        $this->references = $references;
        return $this;
    }

    public function getReferences()
    {
        return $this->references;
    }

    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getReviewedAuthor()
    {
        return $this->reviewedAuthor;
    }

    public function setReviewedTitle($reviewedTitle)
    {
        $this->reviewedTitle = $reviewedTitle;
        return $this;
    }

    public function getReviewedTitle()
    {
        return $this->reviewedTitle;
    }

    public function setScale($scale)
    {
        $this->scale = $scale;
        return $this;
    }

    public function getScale()
    {
        return $this->scale;
    }

    /**
     * Name of a school, university or similar institution where a thesis was written.
     *
     * @param string $school
     * @return \Geissler\Converter\Model\Entry
     */
    public function setSchool($school)
    {
        $this->school = $school;
        return $this;
    }

    /**
     * Name of a school, university or similar institution where a thesis was written.
     *
     * @return string
     */
    public function getSchool()
    {
        return $this->school;
    }

    public function setSection($section)
    {
        $this->section = $section;
        return $this;
    }

    public function getSection()
    {
        return $this->section;
    }

    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \Geissler\Converter\Model\Dates
     */
    public function getSubmitted()
    {
        return $this->submitted;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitleSecondary($titleSecondary)
    {
        $this->titleSecondary = $titleSecondary;
        return $this;
    }

    public function getTitleSecondary()
    {
        return $this->titleSecondary;
    }

    public function setTitleShort($titleShort)
    {
        $this->titleShort = $titleShort;
        return $this;
    }

    public function getTitleShort()
    {
        return $this->titleShort;
    }


    /**
     * @return \Geissler\Converter\Model\Persons
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * @return \Geissler\Converter\Model\Type
     */
    public function getType()
    {
        return $this->type;
    }

    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }

    public function getVolume()
    {
        return $this->volume;
    }

    public function setYearSuffix($yearSuffix)
    {
        $this->yearSuffix = $yearSuffix;
        return $this;
    }

    public function getYearSuffix()
    {
        return $this->yearSuffix;
    }
}
