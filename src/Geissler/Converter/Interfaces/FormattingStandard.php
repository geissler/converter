<?php
namespace Geissler\Converter\Interfaces;

use Geissler\Converter\Model\Entries;

/**
 * Methods which must be implemented to transfer a standard via an \Geissler\Converter\Model\Entries object into
 * an other format.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
interface FormattingStandard
{
    /**
     * Constructor.
     *
     * @param string $data The data to parse.
     */
    public function __construct($data = '');

    /**
     * Transfers the given data or via constructor injected data into an Entries object.
     *
     * @param string $data
     * @return boolean
     */
    public function parse($data = '');

    /**
     * Retrieve the generated \Geissler\Converter\Model\Entries object.
     *
     * @throws \ErrorException when no entries object is set.
     * @return \Geissler\Converter\Model\Entries
     */
    public function retrieve();

    /**
     * Transfer the data from the \Geissler\Converter\Model\Entries object into valid entries of the given
     * standard.
     *
     * @param \Geissler\Converter\Model\Entries $data
     * @return string
     */
    public function create(Entries $data);
}
