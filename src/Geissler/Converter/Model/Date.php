<?php
namespace Geissler\Converter\Model;

/**
 * A date entry.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Date
{
    /** @var integer */
    private $year;
    /** @var string|integer */
    private $month;
    /** @var integer|string */
    private $day;
    /** @var integer */
    private $hour;
    /** @var integer */
    private $minute;
    /** @var integer */
    private $second;
    /** @var string */
    private $season;

    /**
     * Day.
     *
     * @param int|string $day
     * @return \Geissler\Converter\Model\Date
     */
    public function setDay($day)
    {
        $this->day = $day;
        return $this;
    }

    /**
     * Day.
     *
     * @return int|string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Hour.
     *
     * @param int $hour
     * @return \Geissler\Converter\Model\Date
     */
    public function setHour($hour)
    {
        $this->hour = $hour;
        return $this;
    }

    /**
     * Hour.
     *
     * @return int
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Minute.
     *
     * @param int $minute
     * @return \Geissler\Converter\Model\Date
     */
    public function setMinute($minute)
    {
        $this->minute = $minute;
        return $this;
    }

    /**
     * Minute.
     *
     * @return int
     */
    public function getMinute()
    {
        return $this->minute;
    }

    /**
     * Month.
     *
     * @param int|string $month
     * @return \Geissler\Converter\Model\Date
     */
    public function setMonth($month)
    {
        $this->month = $month;
        return $this;
    }

    /**
     * Month.
     * @return int|string
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Name of a season.
     *
     * @param string $season
     * @return \Geissler\Converter\Model\Date
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Name of a season.
     *
     * @return string
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Second.
     *
     * @param int $second
     * @return \Geissler\Converter\Model\Date
     */
    public function setSecond($second)
    {
        $this->second = $second;
        return $this;
    }

    /**
     * Second.
     *
     * @return int
     */
    public function getSecond()
    {
        return $this->second;
    }

    /**
     * Year.
     *
     * @param int $year
     * @return \Geissler\Converter\Model\Date
     */
    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    /**
     * Year.
     *
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }
}
