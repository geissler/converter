<?php
namespace Geissler\Converter\Model;

use Geissler\Converter\Model\Container;
use Geissler\Converter\Model\Person;

/**
 * Group of Person objects as "array" object.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Persons extends Container
{
    /**
     * Add a person object.
     *
     * @param Person $person
     * @return Persons
     */
    public function setPerson(Person $person)
    {
        return $this->setData($person);
    }
}
