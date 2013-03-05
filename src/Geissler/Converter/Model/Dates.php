<?php
namespace Geissler\Converter\Model;

use Geissler\Converter\Model\Container;
use Geissler\Converter\Model\Date;

/**
 * Group of dates (Geissler\Converter\Model\Date).
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Dates extends Container
{
    /**
     * Adda a new Geissler\Converter\Model\Date object.
     *
     * @param Date $date
     * @return Container
     */
    public function setDate(Date $date)
    {
        return $this->setData($date);
    }
}
