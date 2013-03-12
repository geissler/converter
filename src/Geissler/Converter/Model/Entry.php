<?php
namespace Geissler\Converter\Model;

use Geissler\Converter\Model\Persons;
use Geissler\Converter\Model\Type;
use Geissler\Converter\Model\Dates;
use Geissler\Converter\Model\Pages;

/**
 * The basic mapping class is following mainly the fields available in the CSL standard.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 * @see http://citationstyles.org/downloads/specification.html
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
    /** @var string */
    private $abstract;
    /** @var string */
    private $annote;
    /** @var string */
    private $archive;
    /** @var string */
    private $archiveLocation;
    /** @var string */
    private $archivePlace;
    /** @var string */
    private $authority;
    /** @var string */
    private $callNumber;
    /** @var string */
    private $label;
    /** @var string */
    private $collectionTitle;
    /** @var string */
    private $containerTitle;
    /** @var string */
    private $containerTitleShort;
    /** @var string */
    private $dimensions;
    /** @var string */
    private $DOI;
    /** @var string */
    private $event;
    /** @var string */
    private $eventPlace;
    /** @var string */
    private $genre;
    /** @var number|string */
    private $ISBN;
    /** @var number|string */
    private $ISSN;
    /** @var string */
    private $jurisdiction;
    /** @var array */
    private $keyword;
    /** @var string */
    private $locator;
    /** @var string */
    private $medium;
    /** @var string */
    private $note;
    /** @var string */
    private $originalPublisher;
    /** @var string */
    private $originalPublisherPlace;
    /** @var string */
    private $originalTitle;
    /** @var \Geissler\Converter\Model\Pages */
    private $pages;
    /** @var string */
    private $PMCID;
    /** @var string */
    private $PMID;
    /** @var string */
    private $publisher;
    /** @var string */
    private $publisherPlace;
    /** @var string */
    private $references;
    /** @var string */
    private $reviewedTitle;
    /** @var string */
    private $scale;
    /** @var string */
    private $section;
    /** @var string */
    private $source;
    /** @var string */
    private $status;
    /** @var string */
    private $title;
    /** @var string */
    private $titleShort;
    /** @var string */
    private $titleSecondary;
    /** @var string */
    private $URL;
    /** @var string|integer */
    private $version;
    /** @var string */
    private $yearSuffix;
    /** @var string|integer */
    private $chapterNumber;
    /** @var string */
    private $collectionNumber;
    /** @var integer|string */
    private $edition;
    /** @var integer|string */
    private $reprintEdition;
    /** @var string|integer */
    private $issue;
    /** @var string|integer */
    private $number;
    /** @var string|integer */
    private $numberOfVolumes;
    /** @var string */
    private $language;
    /** @var string */
    private $database;
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
    /** @var string */
    private $pdf;
    /** @var string */
    private $fullText;
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

    /**
     * Init all necessary objects.
     */
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
        $this->pages                =   new Pages();
        $this->keyword              =   array();
    }

    /**
     * Digital Object Identifier.
     *
     * @param string $DOI
     * @return Entry
     */
    public function setDOI($DOI)
    {
        $this->DOI = $DOI;
        return $this;
    }

    /**
     * Digital Object Identifier.
     *
     * @return string
     */
    public function getDOI()
    {
        return $this->DOI;
    }

    /**
     * International Standard Book Number.
     *
     * @param $ISBN
     * @return Entry
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
        return $this;
    }

    /**
     * International Standard Book Number.
     *
     * @return number|string
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * International Standard Serial Number.
     *
     * @param $ISSN
     * @return Entry
     */
    public function setISSN($ISSN)
    {
        $this->ISSN = $ISSN;
        return $this;
    }

    /**
     * International Standard Serial Number.
     *
     * @return number|string
     */
    public function getISSN()
    {
        return $this->ISSN;
    }

    /**
     * PubMed Central reference number.
     *
     * @param $PMCID
     * @return Entry
     */
    public function setPMCID($PMCID)
    {
        $this->PMCID = $PMCID;
        return $this;
    }

    /**
     * PubMed Central reference number
     *
     * @return string
     */
    public function getPMCID()
    {
        return $this->PMCID;
    }

    /**
     * PubMed reference number
     *
     * @param $PMID
     * @return Entry
     */
    public function setPMID($PMID)
    {
        $this->PMID = $PMID;
        return $this;
    }

    /**
     * PubMed reference number
     *
     * @return string
     */
    public function getPMID()
    {
        return $this->PMID;
    }

    /**
     * A url (Uniform Resource Locator).
     *
     * @param $URL
     * @return Entry
     */
    public function setURL($URL)
    {
        $this->URL = $URL;
        return $this;
    }

    /**
     * A url (Uniform Resource Locator).
     *
     * @return string
     */
    public function getURL()
    {
        return $this->URL;
    }

    /**
     * An abstract of the item.
     *
     * @param $abstract
     * @return Entry
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;
        return $this;
    }

    /**
     * An abstract of the item.
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Date(s) the item has been accessed.
     *
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

    /**
     * A reader's notes about the item content.
     *
     * @param $annote
     * @return Entry
     */
    public function setAnnote($annote)
    {
        $this->annote = $annote;
        return $this;
    }

    /**
     * A reader's notes about the item content.
     *
     * @return string
     */
    public function getAnnote()
    {
        return $this->annote;
    }

    /**
     * An archive storing the item
     *
     * @param $archive
     * @return Entry
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * An archive storing the item.
     *
     * @return string
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Storage location within an archive (e.g. a box and folder number).
     *
     * @param $archiveLocation
     * @return Entry
     */
    public function setArchiveLocation($archiveLocation)
    {
        $this->archiveLocation = $archiveLocation;
        return $this;
    }

    /**
     * Storage location within an archive (e.g. a box and folder number).
     *
     * @return string
     */
    public function getArchiveLocation()
    {
        return $this->archiveLocation;
    }

    /**
     * Geographic location of the archive, like city.
     *
     * @param $archivePlace
     * @return Entry
     */
    public function setArchivePlace($archivePlace)
    {
        $this->archivePlace = $archivePlace;
        return $this;
    }

    /**
     * Geographic location of the archive, like city.
     *
     * @return string
     */
    public function getArchivePlace()
    {
        return $this->archivePlace;
    }

    /**
     * The author(s).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * The issuing or judicial authority (e.g. "USPTO" for a patent, "Fairfax Circuit Court" for a legal case).
     *
     * @param string $authority
     * @return \Geissler\Converter\Model\Entry
     */
    public function setAuthority($authority)
    {
        $this->authority = $authority;

        return $this;
    }

    /**
     * The issuing or judicial authority (e.g. "USPTO" for a patent, "Fairfax Circuit Court" for a legal case).
     *
     * @return string
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * Identification number inside a library.
     *
     * @param $callNumber
     * @return Entry
     */
    public function setCallNumber($callNumber)
    {
        $this->callNumber = $callNumber;
        return $this;
    }

    /**
     * Identification number inside a library.
     *
     * @return string
     */
    public function getCallNumber()
    {
        return $this->callNumber;
    }

    /**
     * Chapter number.
     *
     * @param $chapterNumber
     * @return Entry
     */
    public function setChapterNumber($chapterNumber)
    {
        $this->chapterNumber = $chapterNumber;
        return $this;
    }

    /**
     * Chapter number.
     *
     * @return int|string
     */
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
     * Editor(s) of a collection.
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getCollectionEditor()
    {
        return $this->collectionEditor;
    }

    /**
     * A number identifying the collection holding the item (e.g. the series number for a book).
     *
     * @param $collectionNumber
     * @return Entry
     */
    public function setCollectionNumber($collectionNumber)
    {
        $this->collectionNumber = $collectionNumber;
        return $this;
    }

    /**
     * A number identifying the collection holding the item (e.g. the series number for a book).
     *
     * @return string
     */
    public function getCollectionNumber()
    {
        return $this->collectionNumber;
    }

    /**
     * Title of the collection holding the item (e.g. the series title for a book).
     *
     * @param $collectionTitle
     * @return Entry
     */
    public function setCollectionTitle($collectionTitle)
    {
        $this->collectionTitle = $collectionTitle;
        return $this;
    }

    /**
     * Title of the collection holding the item (e.g. the series title for a book).
     *
     * @return string
     */
    public function getCollectionTitle()
    {
        return $this->collectionTitle;
    }

    /**
     * The composer(s) of a music record.
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getComposer()
    {
        return $this->composer;
    }

    /**
     * The author(s) of the container holding the item (e.g. the book author for a book chapter).
     *
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

    /**
     * The name of a journal for a journal article or magazine, the title for a book chapter or an article in a book.
     *
     * @return string
     */
    public function getContainerTitle()
    {
        return $this->containerTitle;
    }

    /**
     * Short/abbreviated form of "containerTitle".
     *
     * @param $containerTitleShort
     * @return Entry
     */
    public function setContainerTitleShort($containerTitleShort)
    {
        $this->containerTitleShort = $containerTitleShort;
        return $this;
    }

    /**
     * Short/abbreviated form of "containerTitle".
     *
     * @return string
     */
    public function getContainerTitleShort()
    {
        return $this->containerTitleShort;
    }

    /**
     * Name of an (online) database. No URL!
     *
     * @param string $database
     * @return \Geissler\Converter\Model\Entry
     */
    public function setDatabase($database)
    {
        $this->database = $database;

        return $this;
    }

    /**
     * Name of an online database. No URL!
     *
     * @return string
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * Physical (e.g. size) or temporal (e.g. running time) dimensions of the item.
     *
     * @param $dimensions
     * @return Entry
     */
    public function setDimensions($dimensions)
    {
        $this->dimensions = $dimensions;
        return $this;
    }

    /**
     * Physical (e.g. size) or temporal (e.g. running time) dimensions of the item.
     *
     * @return string
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * Director(s) (e.g. of a film).
     * @return \Geissler\Converter\Model\Persons
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Edition.
     *
     * @param integer|string $edition
     * @return Entry
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
        return $this;
    }

    /**
     * Edition.
     *
     * @return int|string
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * Edition of a reprint.
     *
     * @param int|string $reprintEdition
     * @return Entry
     */
    public function setReprintEdition($reprintEdition)
    {
        $this->reprintEdition = $reprintEdition;

        return $this;
    }

    /**
     * Edition of a reprint.
     *
     * @return int|string
     */
    public function getReprintEdition()
    {
        return $this->reprintEdition;
    }

    /**
     * Editor(s).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getEditor()
    {
        return $this->editor;
    }

    /**
     * Managing editor(s) ("Directeur de la Publication" in French).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getEditorialDirector()
    {
        return $this->editorialDirector;
    }

    /**
     * A name of the related event (e.g. the conference name when citing a conference paper).
     *
     * @param $event
     * @return Entry
     */
    public function setEvent($event)
    {
        $this->event = $event;
        return $this;
    }

    /**
     * A name of the related event (e.g. the conference name when citing a conference paper).
     *
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Date(s) of the related event.
     *
     * @return \Geissler\Converter\Model\Dates
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Geographic location of the related event, like a city.
     *
     * @param $eventPlace
     * @return Entry
     */
    public function setEventPlace($eventPlace)
    {
        $this->eventPlace = $eventPlace;
        return $this;
    }

    /**
     * Geographic location of the related event, like a city.
     *
     * @return string
     */
    public function getEventPlace()
    {
        return $this->eventPlace;
    }

    /**
     * Link to Full-text.
     *
     * @param string $fullText
     * @return \Geissler\Converter\Model\Entry
     */
    public function setFullText($fullText)
    {
        $this->fullText = $fullText;

        return $this;
    }

    /**
     * Link to Full-text.
     *
     * @return string
     */
    public function getFullText()
    {
        return $this->fullText;
    }

    /**
     * Class, type or genre of the item.
     *
     * @param $genre
     * @return Entry
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
        return $this;
    }

    /**
     * Class, type or genre of the item.
     *
     * @return string
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Illustrator(s).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getIllustrator()
    {
        return $this->illustrator;
    }

    /**
     * Interviewer(s).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getInterviewer()
    {
        return $this->interviewer;
    }

    /**
     * Issue.
     *
     * @param $issue
     * @return Entry
     */
    public function setIssue($issue)
    {
        $this->issue = $issue;
        return $this;
    }

    /**
     * Issue.
     *
     * @return int|string
     */
    public function getIssue()
    {
        return $this->issue;
    }

    /**
     * Date(s) the item was issued/published.
     *
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

    /**
     * Geographic scope of relevance.
     *
     * @param $jurisdiction
     * @return Entry
     */
    public function setJurisdiction($jurisdiction)
    {
        $this->jurisdiction = $jurisdiction;
        return $this;
    }

    /**
     * Geographic scope of relevance.
     *
     * @return string
     */
    public function getJurisdiction()
    {
        return $this->jurisdiction;
    }

    /**
     * A keyword or a array of keywords. Multiple keywords will be split into an array.
     *
     * @param string|array $keyword
     * @return Entry
     */
    public function setKeyword($keyword)
    {
        if (is_array($keyword) == false) {
            if (preg_match_all('/([\p{L}\-]+)/u', $keyword, $match) !== 0) {
                $keyword  =   $match[0];
            } else {
                $keyword  =   array($keyword);
            }
        }

        $this->keyword  =   array_merge($this->keyword, $keyword);
        return $this;
    }

    /**
     * An array of keywords.
     *
     * @return array
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * A label.
     *
     * @param $label
     * @return Entry
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    /**
     * A label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Language.
     *
     * @param string $language
     * @return \Geissler\Converter\Model\Entry
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Language.
     *
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Medium description (e.g. "CD", "DVD", etc.).
     *
     * @param $medium
     * @return Entry
     */
    public function setMedium($medium)
    {
        $this->medium = $medium;
        return $this;
    }

    /**
     * Medium description (e.g. "CD", "DVD", etc.).
     *
     * @return string
     */
    public function getMedium()
    {
        return $this->medium;
    }

    /**
     * Additional, personal note.
     *
     * @param $note
     * @return Entry
     */
    public function setNote($note)
    {
        $this->note = $note;
        return $this;
    }

    /**
     * Additional, personal note.
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Number.
     *
     * @param $number
     * @return Entry
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * Number.
     *
     * @return int|string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Total number of volumes.
     *
     * @param $numberOfVolumes
     * @return Entry
     */
    public function setNumberOfVolumes($numberOfVolumes)
    {
        $this->numberOfVolumes = $numberOfVolumes;
        return $this;
    }

    /**
     * Total number of volumes.
     *
     * @return int|string
     */
    public function getNumberOfVolumes()
    {
        return $this->numberOfVolumes;
    }

    /**
     * Original author(s).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getOriginalAuthor()
    {
        return $this->originalAuthor;
    }

    /**
     * Date(s) for the original record.
     *
     * @return \Geissler\Converter\Model\Dates
     */
    public function getOriginalDate()
    {
        return $this->originalDate;
    }

    /**
     * Original publisher, for items that have been republished by a different publisher.
     *
     * @param $originalPublisher
     * @return Entry
     */
    public function setOriginalPublisher($originalPublisher)
    {
        $this->originalPublisher = $originalPublisher;
        return $this;
    }

    /**
     * Original publisher, for items that have been republished by a different publisher.
     *
     * @return string
     */
    public function getOriginalPublisher()
    {
        return $this->originalPublisher;
    }

    /**
     * Geographic location of the original publisher.
     *
     * @param $originalPublisherPlace
     * @return Entry
     */
    public function setOriginalPublisherPlace($originalPublisherPlace)
    {
        $this->originalPublisherPlace = $originalPublisherPlace;
        return $this;
    }

    /**
     * Geographic location of the original publisher.
     *
     * @return string
     */
    public function getOriginalPublisherPlace()
    {
        return $this->originalPublisherPlace;
    }

    /**
     * Title of the original version or untranslated title.
     *
     * @param $originalTitle
     * @return Entry
     */
    public function setOriginalTitle($originalTitle)
    {
        $this->originalTitle = $originalTitle;
        return $this;
    }

    /**
     * Title of the original version or untranslated title.
     *
     * @return string
     */
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
     * The number of pages in a book or a range of pages for an article in a journal.
     *
     * @return \Geissler\Converter\Model\Pages
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * A link or url a pdf file containing the record.
     *
     * @param string $pdf
     * @return \Geissler\Converter\Model\Entry
     */
    public function setPdf($pdf)
    {
        $this->pdf = $pdf;

        return $this;
    }

    /**
     * A link or url a pdf file containing the record.
     *
     * @return string
     */
    public function getPdf()
    {
        return $this->pdf;
    }

    /**
     * Publisher.
     *
     * @param $publisher
     * @return Entry
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    /**
     * Publisher.
     *
     * @return string
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * Geographic location of the publisher.
     *
     * @param $publisherPlace
     * @return Entry
     */
    public function setPublisherPlace($publisherPlace)
    {
        $this->publisherPlace = $publisherPlace;
        return $this;
    }

    /**
     * Geographic location of the publisher.
     *
     * @return string
     */
    public function getPublisherPlace()
    {
        return $this->publisherPlace;
    }

    /**
     * Recipient(s) (e.g. of a letter).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Resources related to the procedural history of a legal case.
     *
     * @param $references
     * @return Entry
     */
    public function setReferences($references)
    {
        $this->references = $references;
        return $this;
    }

    /**
     * Resources related to the procedural history of a legal case.
     *
     * @return string
     */
    public function getReferences()
    {
        return $this->references;
    }

    /**
     * Author(s) writing the review.
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getReviewedAuthor()
    {
        return $this->reviewedAuthor;
    }

    /**
     * Title of the item reviewed by the current item.
     *
     * @param $reviewedTitle
     * @return Entry
     */
    public function setReviewedTitle($reviewedTitle)
    {
        $this->reviewedTitle = $reviewedTitle;
        return $this;
    }

    /**
     * Title of the item reviewed by the current item.
     *
     * @return string
     */
    public function getReviewedTitle()
    {
        return $this->reviewedTitle;
    }

    /**
     * Scale of e.g. a map.
     *
     * @param $scale
     * @return Entry
     */
    public function setScale($scale)
    {
        $this->scale = $scale;
        return $this;
    }

    /**
     * Scale of e.g. a map.
     *
     * @return string
     */
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

    /**
     * Container section holding the item (e.g. "politics" for a newspaper article).
     *
     * @param $section
     * @return Entry
     */
    public function setSection($section)
    {
        $this->section = $section;
        return $this;
    }

    /**
     * Container section holding the item (e.g. "politics" for a newspaper article).
     *
     * @return string
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * From whence the item originates. No database!
     *
     * @param $source
     * @return Entry
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * From whence the item originates. No database!
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Publication status of the item (e.g. "forthcoming").
     *
     * @param $status
     * @return Entry
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Publication status of the item (e.g. "forthcoming").
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Date(s) the item (e.g. a manuscript) has been submitted for publication.
     *
     * @return \Geissler\Converter\Model\Dates
     */
    public function getSubmitted()
    {
        return $this->submitted;
    }

    /**
     * Primary title of the item.
     *
     * @param $title
     * @return Entry
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Primary title of the item.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Secondary title.
     *
     * @param $titleSecondary
     * @return Entry
     */
    public function setTitleSecondary($titleSecondary)
    {
        $this->titleSecondary = $titleSecondary;
        return $this;
    }

    /**
     * Secondary title.
     *
     * @return string
     */
    public function getTitleSecondary()
    {
        return $this->titleSecondary;
    }

    /**
     * Short/abbreviated form of "title".
     *
     * @param $titleShort
     * @return Entry
     */
    public function setTitleShort($titleShort)
    {
        $this->titleShort = $titleShort;
        return $this;
    }

    /**
     * Short/abbreviated form of "title".
     *
     * @return string
     */
    public function getTitleShort()
    {
        return $this->titleShort;
    }

    /**
     * Translator(s).
     *
     * @return \Geissler\Converter\Model\Persons
     */
    public function getTranslator()
    {
        return $this->translator;
    }

    /**
     * Type of literature entry, like book, article.
     *
     * @return \Geissler\Converter\Model\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Version.
     *
     * @param $version
     * @return Entry
     */
    public function setVersion($version)
    {
        $this->version = $version;
        return $this;
    }

    /**
     * Version.
     *
     * @return int|string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Volume holding the item (e.g. "2" when citing a chapter from book volume 2).
     *
     * @param $volume
     * @return Entry
     */
    public function setVolume($volume)
    {
        $this->volume = $volume;
        return $this;
    }

    /**
     * Volume holding the item (e.g. "2" when citing a chapter from book volume 2).
     *
     * @return int|string
     */
    public function getVolume()
    {
        return $this->volume;
    }

    /**
     * A disambiguating year suffix in author-date styles (e.g. "a" in "Doe, 1999a").
     *
     * @param $yearSuffix
     * @return Entry
     */
    public function setYearSuffix($yearSuffix)
    {
        $this->yearSuffix = $yearSuffix;
        return $this;
    }

    /**
     * A disambiguating year suffix in author-date styles (e.g. "a" in "Doe, 1999a").
     *
     * @return string
     */
    public function getYearSuffix()
    {
        return $this->yearSuffix;
    }
}
