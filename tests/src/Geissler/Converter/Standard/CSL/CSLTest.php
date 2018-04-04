<?php
namespace Geissler\Converter\Standard\CSL;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-10 at 14:46:54.
 */
class CSLTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var CSL
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new CSL;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers \Geissler\Converter\Standard\CSL\CSL::__construct
     * @covers \Geissler\Converter\Standard\Basic\StandardAbstract::parse
     * @covers \Geissler\Converter\Standard\Basic\StandardAbstract::retrieve
     * @covers \Geissler\Converter\Standard\Basic\StandardAbstract::create
     * @covers \Geissler\Converter\Standard\Basic\StandardAbstract::setCreator
     * @covers \Geissler\Converter\Standard\Basic\StandardAbstract::getCreator
     * @covers \Geissler\Converter\Standard\Basic\StandardAbstract::setParser
     * @covers \Geissler\Converter\Standard\Basic\StandardAbstract::getParser
     * @dataProvider dataProviderParse
     */
    public function testParse($input)
    {
        $this->assertTrue($this->object->parse($input));
        $this->assertInstanceOf('\Geissler\Converter\Model\Entries', $this->object->retrieve());
        $this->assertInternalType('array', json_decode($this->object->create($this->object->retrieve())));
    }

    public function dataProviderParse()
    {
        return array(
            array('[
    {
        "id": "ITEM-1",
        "issued": {
            "date-parts": [
                [
                    1998,
                    4,
                    10
                ]
            ]
        },
        "title": "BookA"
    }
]')
        );
    }
}
