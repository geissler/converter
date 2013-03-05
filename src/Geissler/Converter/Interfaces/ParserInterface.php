<?php
namespace Geissler\Converter\Interfaces;

use Geissler\Converter\Model\Entries;

/**
 * Transfer entries of a standard into a \Geissler\Converter\Model\Entries object.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
interface ParserInterface
{
    /**
     * Transfer the data from a standard into a \Geissler\Converter\Model\Entries object.
     *
     * @param string $data
     * @return boolean
     */
    public function parse($data);

    /**
     * Retrieve the \Geissler\Converter\Model\Entries object containing the parsed data.
     *
     * \ErrorException when no entries object is set.
     * @return \Geissler\Converter\Model\Entries
     */
    public function retrieve();
}
