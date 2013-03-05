<?php
namespace Geissler\Converter\Model;

/**
 * A model representing a person.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Person
{
    /** @var boolean */
    private $female;
    /** @var boolean */
    private $male;
    /** @var string */
    private $given;
    /** @var string */
    private $family;
    /** @var string */
    private $suffix;
    /** @var string */
    private $nonDroppingParticle;
    /** @var string */
    private $droppingParticle;

    /**
     * Init values.
     */
    public function __construct()
    {
        $this->female               =   false;
        $this->male                 =   false;
        $this->given                =   '';
        $this->family               =   '';
        $this->suffix               =   '';
        $this->nonDroppingParticle  =   '';
        $this->droppingParticle     =   '';
    }

    /**
     * A particle e.g. von or van.
     *
     * @param string $droppingParticle
     * @return \Geissler\Converter\Model\Person
     */
    public function setDroppingParticle($droppingParticle)
    {
        $this->droppingParticle = trim($droppingParticle);
        return $this;
    }

    /**
     * A particle e.g. von or van.
     *
     * @return string
     */
    public function getDroppingParticle()
    {
        return $this->droppingParticle;
    }

    /**
     * The family name(s).
     *
     * @param string $family
     * @return \Geissler\Converter\Model\Person
     */
    public function setFamily($family)
    {
        $this->family = trim($family);
        return $this;
    }

    /**
     * The family name(s).
     *
     * @return string
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * If the person is a female.
     *
     * @param boolean $female
     * @return \Geissler\Converter\Model\Person
     */
    public function setFemale($female)
    {
        $this->female = $female;
        return $this;
    }

    /**
     * If the person is a female.
     *
     * @return boolean
     */
    public function getFemale()
    {
        return $this->female;
    }

    /**
     * The given or first name(s) like Peter Paul.
     *
     * @param string $given
     * @return \Geissler\Converter\Model\Person
     */
    public function setGiven($given)
    {
        $this->given = trim($given);
        return $this;
    }

    /**
     * The given or first name(s) like Peter Paul.
     *
     * @return string
     */
    public function getGiven()
    {
        return $this->given;
    }

    /**
     * If the person is a male.
     *
     * @param boolean $male
     * @return \Geissler\Converter\Model\Person
     */
    public function setMale($male)
    {
        $this->male = $male;
        return $this;
    }

    /**
     * If the person is a male.
     *
     * @return boolean
     */
    public function getMale()
    {
        return $this->male;
    }

    /**
     * A particle of the family name which should not be dropped.
     *
     * @param string $nonDroppingParticle
     * @return \Geissler\Converter\Model\Person
     */
    public function setNonDroppingParticle($nonDroppingParticle)
    {
        $this->nonDroppingParticle = trim($nonDroppingParticle);
        return $this;
    }

    /**
     * A particle of the family name which should not be dropped.
     *
     * @return string
     */
    public function getNonDroppingParticle()
    {
        return $this->nonDroppingParticle;
    }

    /**
     * Additional name suffixes like jr, junior etc.
     *
     * @param string $suffix
     * @return \Geissler\Converter\Model\Person
     */
    public function setSuffix($suffix)
    {
        $this->suffix = trim($suffix);
        return $this;
    }

    /**
     * Additional name suffixes like jr, junior etc.
     *
     * @return string
     */
    public function getSuffix()
    {
        return $this->suffix;
    }
}
