<?php
namespace Geissler\Converter\Standard\Basic;

use Geissler\Converter\Interfaces\FormattingStandard;
use Geissler\Converter\Interfaces\ParserInterface;
use Geissler\Converter\Interfaces\CreatorInterface;
use Geissler\Converter\Model\Entries;

/**
 * A basic class which each standard must extend by injecting a parser and creator object via the setter methods in
 * it's constructor.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
abstract class StandardAbstract implements FormattingStandard
{
    /** @var \Geissler\Converter\Model\Entries */
    private $entries;
    /** @var string */
    private $data;
    /** @var \Geissler\Converter\Interfaces\ParserInterface */
    private $parser;
    /** @var \Geissler\Converter\Interfaces\CreatorInterface */
    private $creator;

    /**
     * Constructor.
     *
     * @param string $data The data to parse.
     */
    public function __construct($data = '')
    {
        $this->data     =   $data;
    }

    /**
     * Transfers the given data or via constructor injected data into an Entries object.
     *
     * @param string $data
     * @return boolean
     */
    public function parse($data = '')
    {
        if ($data !== '') {
            $this->data =   $data;
        }

        if ($this->getParser()->parse($this->data) == true) {
            $this->entries  =   $this->getParser()->retrieve();
            return true;
        }

        return false;
    }

    /**
     * Retrieve the generated \Geissler\Converter\Model\Entries object.
     *
     * @throws \ErrorException when no entries object is set.
     * @return \Geissler\Converter\Model\Entries
     */
    public function retrieve()
    {
        if (isset($this->entries) == true) {
            return $this->entries;
        }

        throw new \ErrorException('No entries object set! Has the data been parsed?');
    }

    /**
     * Transfer the data from the \Geissler\Converter\Model\Entries object into valid entries of the given
     * standard.
     *
     * @param \Geissler\Converter\Model\Entries $data
     * @return string
     */
    public function create(Entries $data)
    {
        if ($this->getCreator()->create($data) == true) {
            return $this->getCreator()->retrieve();
        }

        return '';
    }

    /**
     * Inject the creator object.
     *
     * @param \Geissler\Converter\Interfaces\CreatorInterface $creator
     * @return \Geissler\Converter\Standard\Basic\StandardAbstract
     */
    protected function setCreator(CreatorInterface $creator)
    {
        $this->creator = $creator;
        return $this;
    }

    /**
     * Access the creator object.
     *
     * @throws \ErrorException when the creator object is missing
     * @return \Geissler\Converter\Interfaces\CreatorInterface
     */
    protected function getCreator()
    {
        if (isset($this->creator) == true) {
            return $this->creator;
        }

        throw new \ErrorException('Error! Missing creator object!');
    }

    /**
     * Inject the parser object.
     *
     * @param \Geissler\Converter\Interfaces\ParserInterface $parser
     * @return \Geissler\Converter\Standard\Basic\StandardAbstract
     */
    protected function setParser(ParserInterface $parser)
    {
        $this->parser = $parser;
        return $this;
    }

    /**
     * Access the parser object.
     *
     * @throws \ErrorException when the parser object is not injected
     * @return \Geissler\Converter\Interfaces\ParserInterface
     */
    protected function getParser()
    {
        if (isset($this->parser) == true) {
            return $this->parser;
        }

        throw new \ErrorException('Error! Missing parser object!');
    }
}
