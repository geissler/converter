<?php
namespace Geissler\Converter\Model;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-05 at 12:36:08.
 */
class DatesTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Dates
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() : void
    {
        $this->object = new Dates;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() : void
    {
    }

    /**
     * @covers Geissler\Converter\Model\Dates::setDate
     * @covers Geissler\Converter\Model\Container::setData
     */
    public function testSetDate()
    {
        $this->assertInstanceOf('\Geissler\Converter\Model\Dates', $this->object->setDate(new Date()));
    }
}
