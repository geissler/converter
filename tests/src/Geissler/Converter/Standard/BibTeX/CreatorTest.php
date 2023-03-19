<?php
namespace Geissler\Converter\Standard\BibTeX;

use Geissler\Converter\Standard\BibTeX\Parser;
use Geissler\Converter\Model\Entries;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-04 at 23:54:39.
 */
class CreatorTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Creator
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() : void
    {
        $this->object = new Creator;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() : void
    {
    }

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Creator::create
     * @covers Geissler\Converter\Standard\BibTeX\Creator::init
     * @covers Geissler\Converter\Standard\BibTeX\Creator::getType
     * @covers Geissler\Converter\Standard\BibTeX\Creator::createPerson
     * @covers Geissler\Converter\Standard\BibTeX\Creator::retrieve
     * @dataProvider dataProviderCreate
     */
    public function testCreate($bibTeX, $result)
    {
        $parser =   new Parser();
        $this->assertTrue($parser->parse($bibTeX));
        $this->assertTrue($this->object->create($parser->retrieve()));
        $this->assertEquals($result, $this->object->retrieve());
    }

    public function dataProviderCreate()
    {
        return array(
            array('@book{book,
  author    = {Peter Babington},
  title     = {The title of the work},
  publisher = {The name of the publisher},
  year      = 1993,
  volume    = 4,
  series    = 10,
  address   = {The address},
  edition   = 3,
  note      = {An optional note},
  isbn      = {3257227892}
}',
                '@book{book,
author = {Babington, Peter},
year = {1993},
title = {The title of the work},
volume = {4},
note = {An optional note},
publisher = {The name of the publisher},
series = {10},
address = {The address},
edition = {3},
isbn = {3257227892}
}'
            ),
            array('@inbook{inbook,
  author       = {Peter Eston},
  title        = {The title of the work},
  chapter      = 8,
  pages        = {201-213},
  publisher    = {The name of the publisher},
  year         = 1993,
  volume       = 4,
  series       = 5,
  address      = {The address of the publisher},
  edition      = 3,
  month        = 7,
  note         = {An optional note}
}',
                '@inbook{inbook,
author = {Eston, Peter},
year = {1993},
month = {7},
pages = {201-213},
title = {The title of the work},
volume = {4},
note = {An optional note},
publisher = {The name of the publisher},
series = {5},
address = {The address of the publisher},
edition = {3},
chapter = {8}
}'
            ),
            array('@Book{Von330,
  author = {von Rohden, Hermann and Winnefeld, Hermann},
  title = {Die antiken Terrakotten IV, 2 - Architektonische römische Tonreliefs der Kaiserzeit},
  shorttitle = {},
  keywords = {Nemi NochZuLesen Terrakotten Vergleich},
  journal = {},
  booktitle = {},
  editor = {},
  address = {Berlin},
  publisher = {},
  volume = {},
  number = {},
  series = {},
  LCCN = {},
  year = {1911},
  month = {},
  pages = {},
  url = {},
  school = {},
  ISBN = {},
  edition = {},
  LCCN = {TA 1233/80 (4,2)},
  key = {Von Rohden330}
}',
            '@book{Von330,
author = {von Rohden, Hermann and Winnefeld, Hermann},
year = {1911},
title = {Die antiken Terrakotten IV, 2 - Architektonische römische Tonreliefs der Kaiserzeit},
address = {Berlin},
keywords = {Nemi, NochZuLesen, Terrakotten, Vergleich}
}'),
            array('@InCollection{Demma1635,
  author = "Demma, Filippo and Pietrafesa, D and Pintucci, Alessandro",
  title = "Palestrina, santuari e domus - Nuovi dati sulla città bassa",
  shorttitle = "",
  keywords = "Entwicklung Kontext NochZuLesen Praeneste Stadt",
  booktitle = "Il Lazio. Regione di Roma. Kolloquium, 12. Juli - 10. September 2002, Palestrina",
  editor = "Gatti, Sandra",
  address = "Rom",
  publisher = "De Luca",
  year = "2002",
  pages = "91-106",
  ISBN = "88-8016-510-0",
  LCCN = "V 2555/200",
  key = "Demma 2002 1635"
}

',
            '@inbook{Demma1635,
author = {Demma, Filippo and Pietrafesa, D and Pintucci, Alessandro},
editor = {Gatti, Sandra},
year = {2002},
pages = {91-106},
title = {Palestrina, santuari e domus - Nuovi dati sulla città bassa},
publisher = {De Luca},
address = {Rom},
isbn = {88-8016-510-0},
booktitle = {Il Lazio. Regione di Roma. Kolloquium, 12. Juli - 10. September 2002, Palestrina},
keywords = {Entwicklung, Kontext, NochZuLesen, Praeneste, Stadt}
}'),
            array('@phdthesis{phdthesis,
  author       = {Peter Joslin},
  title        = {The title of the work},
  school       = {The school where the thesis was written},
  year         = 1993,
  address      = {The address of the publisher},
  month        = 7,
  note         = {An optional note},
  pages        = 23
}',
            '@phdthesis{phdthesis,
author = {Joslin, Peter},
year = {1993},
month = {7},
pages = {23},
title = {The title of the work},
note = {An optional note},
address = {The address of the publisher},
school = {The school where the thesis was written}
}'),
            array('@Book{Von330,
  author = {von Rohden, Hermann and Winnefeld, Hermann},
  title = {Die antiken Terrakotten IV, 2 - Architektonische römische Tonreliefs der Kaiserzeit},
  shorttitle = {},
  keywords = {Nemi NochZuLesen Terrakotten Vergleich},
  journal = {},
  booktitle = {},
  editor = {},
  address = {Berlin},
  publisher = {},
  volume = {},
  number = {},
  series = {},
  LCCN = {},
  year = {1911},
  month = {},
  pages = {},
  url = {},
  school = {},
  ISBN = {},
  edition = {},
  LCCN = {TA 1233/80 (4,2)},
  key = {Von Rohden330}
}

@Book{Pensabene332,
  author = {Pensabene, Patrizio},
  title = {Scavi di Ostia VII - I capitelli},
  shorttitle = {},
  keywords = {Architektur NochZuLesen Ostia Vergleich},
  journal = {},
  booktitle = {},
  editor = {},
  address = {Rom},
  publisher = {},
  volume = {},
  number = {},
  series = {},
  LCCN = {},
  year = {1973},
  month = {},
  pages = {},
  url = {},
  school = {},
  ISBN = {},
  edition = {},
  LCCN = {UD Ostia 12400 (7)},
  key = {Pensabene332}
}
            ',
            '@book{Von330,
author = {von Rohden, Hermann and Winnefeld, Hermann},
year = {1911},
title = {Die antiken Terrakotten IV, 2 - Architektonische römische Tonreliefs der Kaiserzeit},
address = {Berlin},
keywords = {Nemi, NochZuLesen, Terrakotten, Vergleich}
}

@book{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}'),
            array(
                '@article{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}
@manual{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}
@inproceedings{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}
@booklet{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}
@techreport{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}
@unpublished{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}
',
                '@article{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}

@book{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}

@inproceedings{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}

@booklet{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}

@techreport{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}

@unpublished{Pensabene332,
author = {Pensabene, Patrizio},
year = {1973},
title = {Scavi di Ostia VII - I capitelli},
address = {Rom},
keywords = {Architektur, NochZuLesen, Ostia, Vergleich}
}'
            )
        );
    }


    /**
     * @covers Geissler\Converter\Standard\BibTeX\Creator::create
     * @covers Geissler\Converter\Standard\BibTeX\Creator::retrieve
     */
    public function testNotCreate()
    {
        $this->assertFalse($this->object->create(new Entries()));
        $this->assertFalse($this->object->retrieve());
    }
}
