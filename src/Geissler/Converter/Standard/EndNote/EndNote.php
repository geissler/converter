<?php
namespace Geissler\Converter\Standard;

use Geissler\Converter\Interfaces\FormattingStandard;
use Geissler\Converter\Model\Entries;

/**
 * EndNote.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class EndNote implements FormattingStandard
{
    /** @var \Geissler\Converter\Model\Entries */
    private $entries;
    /** @var string */
    private $data;

    /**
     * Constructor.
     *
     * @param string $data The data to parse.
     */
    public function __construct($data = '')
    {
        $this->data =   $data;
    }

    /**
     * Transfers the given data or via constructor injected data into an Entries object.
     *
     * @param string $data
     * @return boolean
     */
    public function parse($data = '')
    {
        // TODO: Implement parse() method.
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
        // TODO: Implement create() method.
    }
}
