<?php
namespace Geissler\Converter\Model;

/**
 * Pages.
 *
 * @author  Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Pages
{
    /** @var int */
    private $start;
    /** @var int */
    private $end;
    /** @var string */
    private $range;
    /** @var int */
    private $total;

    /**
     * Last page of a page range.
     *
     * @param int $end
     * @return \Geissler\Converter\Model\Pages
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Last page of a page range.
     *
     * @return int
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * A page range.
     *
     * @param string $range
     * @return \Geissler\Converter\Model\Pages
     */
    public function setRange($range)
    {
        $this->range = $range;

        return $this;
    }

    /**
     * A page range.
     *
     * @return string
     */
    public function getRange()
    {
        return $this->range;
    }

    /**
     * First page of a page range.
     *
     * @param int $start
     * @return \Geissler\Converter\Model\Pages
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * First page of a page range.
     *
     * @return int
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Total number of pages.
     *
     * @param int $total
     * @return \Geissler\Converter\Model\Pages
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Total number of pages.
     *
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
}
