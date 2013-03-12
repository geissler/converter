<?php
namespace Geissler\Converter\Model;

/**
 * Mapping the different names for different types of entries to a common name.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Type
{
    /** @var string */
    private $type;

    /**
     * Only an abstract.
     *
     * @return Type
     */
    public function setAbstract()
    {
        $this->type =   'abstract';
        return $this;
    }

    /**
     * An unspecific article.
     *
     * @return Type
     */
    public function setArticle()
    {
        $this->type = 'article';
        return $this;
    }

    /**
     * An article in a journal.
     *
     * @return Type
     */
    public function setArticleJournal()
    {
        $this->type = 'articleJournal';
        return $this;
    }

    /**
     * An article in a magazine.
     *
     * @return Type
     */
    public function setArticleMagazine()
    {
        $this->type = 'articleMagazine';
        return $this;
    }

    /**
     * An article in a newspaper.
     *
     * @return Type
     */
    public function setArticleNewspaper()
    {
        $this->type = 'articleNewspaper';
        return $this;
    }

    /**
     * A bill.
     *
     * @return Type
     */
    public function setBill()
    {
        $this->type = 'bill';
        return $this;
    }

    /**
     * A book.
     *
     * @return Type
     */
    public function setBook()
    {
        $this->type = 'book';
        return $this;
    }

    /**
     * A broadcast.
     *
     * @return Type
     */
    public function setBroadcast()
    {
        $this->type = 'broadcast';
        return $this;
    }

    /**
     * A catalog.
     *
     * @return Type
     */
    public function setCatalog()
    {
        $this->type =   'catalog';
        return $this;
    }

    /**
     * A chapter in a book.
     *
     * @return Type
     */
    public function setChapter()
    {
        $this->type = 'chapter';
        return $this;
    }

    /**
     * A dataset.
     *
     * @return Type
     */
    public function setDataset()
    {
        $this->type = 'dataset';
        return $this;
    }

    /**
     * A dictionary.
     *
     * @return Type
     */
    public function setDictionary()
    {
        $this->type = 'dictionary';
        return $this;
    }

    /**
     * A encyclopedia.
     *
     * @return Type
     */
    public function setEncyclopedia()
    {
        $this->type = 'encyclopedia';
        return $this;
    }

    /**
     * A entry in a non-dictionary and non-encyclopedia.
     *
     * @return Type
     */
    public function setEntry()
    {
        $this->type = 'entry';
        return $this;
    }

    /**
     * A entry inside a dictionary.
     *
     * @return Type
     */
    public function setEntryDictionary()
    {
        $this->type = 'entryDictionary';
        return $this;
    }

    /**
     * A entry inside a encyclopedia.
     *
     * @return Type
     */
    public function setEntryEncyclopedia()
    {
        $this->type = 'entryEncyclopedia';
        return $this;
    }

    /**
     * A figure.
     *
     * @return Type
     */
    public function setFigure()
    {
        $this->type = 'figure';
        return $this;
    }

    /**
     * A graphic.
     *
     * @return Type
     */
    public function setGraphic()
    {
        $this->type = 'graphic';
        return $this;
    }

    /**
     * A interview.
     *
     * @return Type
     */
    public function setInterview()
    {
        $this->type = 'interview';
        return $this;
    }

    /**
     * A legal case.
     *
     * @return Type
     */
    public function setLegalCase()
    {
        $this->type = 'legalCase';
        return $this;
    }

    /**
     * A legislation.
     *
     * @return Type
     */
    public function setLegislation()
    {
        $this->type = 'legislation';
        return $this;
    }

    /**
     * A manuscript or unpublished work.
     *
     * @return Type
     */
    public function setManuscript()
    {
        $this->type = 'manuscript';
        return $this;
    }

    /**
     * A map.
     *
     * @return Type
     */
    public function setMap()
    {
        $this->type = 'map';
        return $this;
    }

    /**
     * A motion picture.
     *
     * @return Type
     */
    public function setMotionPicture()
    {
        $this->type = 'motionPicture';
        return $this;
    }

    /**
     * A musical score.
     *
     * @return Type
     */
    public function setMusicalScore()
    {
        $this->type = 'musicalScore';
        return $this;
    }

    /**
     * A pamphlet.
     *
     * @return Type
     */
    public function setPamphlet()
    {
        $this->type = 'pamphlet';
        return $this;
    }

    /**
     * A conference.
     *
     * @return Type
     */
    public function setConference()
    {
        $this->type = 'conference';
        return $this;
    }

    /**
     * A paper inside a conference book.
     *
     * @return Type
     */
    public function setPaperConference()
    {
        $this->type = 'paperConference';
        return $this;
    }

    /**
     * A patent.
     *
     * @return Type
     */
    public function setPatent()
    {
        $this->type = 'patent';
        return $this;
    }

    /**
     * A personal communication.
     *
     * @return Type
     */
    public function setPersonalCommunication()
    {
        $this->type = 'personalCommunication';
        return $this;
    }

    /**
     * A post on a non-blog like a forum.
     *
     * @return Type
     */
    public function setPost()
    {
        $this->type = 'post';
        return $this;
    }

    /**
     * A post on a blog.
     *
     * @return Type
     */
    public function setPostWeblog()
    {
        $this->type = 'postWeblog';
        return $this;
    }

    /**
     * A report.
     *
     * @return Type
     */
    public function setReport()
    {
        $this->type = 'report';
        return $this;
    }

    /**
     * A review.
     *
     * @return Type
     */
    public function setReview()
    {
        $this->type = 'review';
        return $this;
    }

    /**
     * A review of a book.
     *
     * @return Type
     */
    public function setReviewBook()
    {
        $this->type = 'reviewBook';
        return $this;
    }

    /**
     * A slide (PowerPoint etc).
     *
     * @return Type
     */
    public function setSlide()
    {
        $this->type =   'slide';
        return $this;
    }

    /**
     * A song.
     *
     * @return Type
     */
    public function setSong()
    {
        $this->type = 'song';
        return $this;
    }

    /**
     * A speech.
     *
     * @return Type
     */
    public function setSpeech()
    {
        $this->type = 'speech';
        return $this;
    }

    /**
     * The name of a software or a computer program.
     *
     * @return Type
     */
    public function setSoftware()
    {
        $this->type =   'software';
        return $this;
    }

    /**
     * A master- or phd-thesis.
     *
     * @return Type
     */
    public function setThesis()
    {
        $this->type = 'thesis';
        return $this;
    }

    /**
     * A treaty.
     *
     * @return Type
     */
    public function setTreaty()
    {
        $this->type = 'treaty';
        return $this;
    }

    /**
     * A website or webpage.
     *
     * @return Type
     */
    public function setWebpage()
    {
        $this->type = 'webpage';
        return $this;
    }

    /**
     * Everything else.
     *
     * @return Type
     */
    public function setUnknown()
    {
        $this->type =   'unknown';
        return $this;
    }

    /**
     * A video.
     *
     * @return Type
     */
    public function setVideo()
    {
        $this->type =   'video';
        return $this;
    }

    /**
     * Retrieve the type.
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
