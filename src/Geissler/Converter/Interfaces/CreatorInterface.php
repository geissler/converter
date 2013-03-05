<?php
namespace Geissler\Converter\Interfaces;

use Geissler\Converter\Model\Entries;

/**
 * Create a valid standard entry based on a given \Geissler\Converter\Model\Entries object.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
interface CreatorInterface
{
    /**
     * Create entries based on the given standard from the \Geissler\Converter\Model\Entries object.
     *
     * @param \Geissler\Converter\Model\Entries $data
     * @return boolean
     */
    public function create(Entries $data);

    /**
     * Retrieve the created standard data. Return false if standard could not be created.
     *
     * @return string|boolean
     */
    public function retrieve();
}
