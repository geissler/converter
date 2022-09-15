<?php
namespace Geissler\Converter\Standard\BibTeX;

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-03-01 at 18:46:39.
 *
 * Examples are mainly copied from https://verbosus.com/bibtex-style-examples.html?lang=de
 * @see https://verbosus.com/bibtex-style-examples.html?lang=de
 */
class ParserTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Parser
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp() : void
    {
        $this->object = new Parser;
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown() : void
    {
    }

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Parser::parse
     * @covers Geissler\Converter\Standard\BibTeX\Parser::extract
     * @covers Geissler\Converter\Standard\BibTeX\Parser::retrieve
     * @covers Geissler\Converter\Standard\BibTeX\Parser::create
     * @covers Geissler\Converter\Standard\BibTeX\Parser::createPersons
     * @dataProvider dataProviderForParseOne
     */
    public function testParseOne($bibTeX, $lastName, $title, $type, $year)
    {
        $this->assertTrue($this->object->parse($bibTeX));
        $this->assertInstanceOf('\Geissler\Converter\Model\Entries', $this->object->retrieve());
        $entries    =   $this->object->retrieve();
        $this->assertInstanceOf('\Geissler\Converter\Model\Entry', $entries[0]);
        /** @var $entry \Geissler\Converter\Model\Entry */
        $entry      =   $entries[0];

        foreach ($entry->getAuthor() as $author) {
            /** @var $author \Geissler\Converter\Model\Person */
            $this->assertInstanceOf('\Geissler\Converter\Model\Person', $author);
            $this->assertEquals($lastName, $author->getFamily());
        }

        $this->assertEquals($title, $entry->getTitle());
        $this->assertEquals($type, $entry->getType()->getType());

        $this->assertInstanceOf('\IteratorAggregate', $entry->getIssued());
        foreach ($entry->getIssued() as $issued) {
            /** @var $issued \Geissler\Converter\Model\Date */
            $this->assertEquals($year, $issued->getYear());
        }
    }

    public function dataProviderForParseOne()
    {
        return array(
            array('@Article{Granino1561,
    author = "Granino Cecere, Maria Grazia",
    title = "Pecunia sacra e proprietà fondiarai nei santuari dell\'Italia centrale - Il contributo dell\'epigrafia",
    shorttitle = "",
    keywords = "Inschrift NochZuLesen Priorit{\"a}t Tibur",
    journal = "ArchRel",
    volume = "11",
    year = "2009",
    pages = "37-62",
    note = "Inhalt Konfus, schwierig",
    URL = "http://www.degruyter.com/view/j/afgs.2009.11.issue-1/9783110208962.1.37/9783110208962.1.37.xml?format=INT",
    note = "Praeneste bei Appian nicht erw{\"a}hnt Se non menziona quello della Fortuna Primigenia a Praeneste, di certo non meno ricco dei precedenti,  solo perch in quel frangente era il luogo di residenza di Lucio Antonio e quindi precluso ad Ottaviano.   => Unter Sulla gepl{\"u}ndert worden  01",
    note = "Magistrate verwalteten das Geld der thesauri (?) L’epigrafia documenta ampiamente a chi spettasse la gestione della pecunia sacra, o meglio dei beni mobili messi a disposizione della divinit: non ai sacerdoti, ma ai magistrati cittadini (duoviri, quattuorviri, aediles, quaestores), piu raramente ad associazioni religiose locali, come ad es. i magistri fani per il santuario di Diana Tifatina presso Capua o, forse, i curatores fani per il tempio di Hercules Victor a Tibur, individui spesso scelti tra gli appartenenti agli ordini senatorio ed equestre o almeno tra i maggiorenti della citta.  42 f.",
    note = "Weihungen k{\"o}nne verkauft werden Se qualche oggetto sara stato dato in dono, donato e dedicato in questo tempio che sia lecito farne uso, venderlo; ove sara stato venduto sara profanato. La vendita, la locazione sara di competenza dell’edile… un altro non potra. Il denaro che sara stato ricavato, con tale denaro sara lecito acquistare, prendere in affitto, dare in affitto, cedere, perche questo tempio sia fatto migliore  43 f.",
    key = "Granino Cecere 2009 1561"
    }',
                'Granino Cecere',
                "Pecunia sacra e proprietà fondiarai nei santuari dell'Italia centrale - Il contributo dell'epigrafia",
                'article',
                '2009'
            ),
            array('@article{article,
  author  = {Peter Adams},
  title   = {The title of the work},
  journal = {The name of the journal},
  year    = 1993,
  number  = 2,
  pages   = {201-213},
  month   = 7,
  note    = {An optional note},
  volume  = 4
}',
                'Adams',
                'The title of the work',
                'article',
                '1993'
            ),
            array('@book{book,
                  author    = {Peter Babington},
                  title     = {The title of the work},
                  publisher = {The name of the publisher},
                  year      = 1993,
                  volume    = 4,
                  series    = 10,
                  address   = {The address},
                  edition   = 3,
                  month     = 7,
                  note      = {An optional note},
                  isbn      = {3257227892}
                }',
                'Babington',
                'The title of the work',
                'book',
                1993
            )
        );
    }

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Parser::parse
     * @covers Geissler\Converter\Standard\BibTeX\Parser::extract
     * @covers Geissler\Converter\Standard\BibTeX\Parser::retrieve
     * @covers Geissler\Converter\Standard\BibTeX\Parser::create
     * @covers Geissler\Converter\Standard\BibTeX\Parser::createPersons
     * @dataProvider dataProviderForParseMultiple
     */
    public function testParseMultiple($bibTeX, array $titles, array $types)
    {
        $this->assertTrue($this->object->parse($bibTeX));
        $entries    =   $this->object->retrieve();
        $this->assertInstanceOf('\Geissler\Converter\Model\Entries', $entries);

        $position   =   0;
        foreach ($entries as $entry) {
            /** @var $entry \Geissler\Converter\Model\Entry */
            $this->assertInstanceOf('\Geissler\Converter\Model\Entry', $entry);
            $this->assertEquals($titles[$position], $entry->getTitle());
            $this->assertEquals($types[$position], $entry->getType()->getType());
            $position++;
        }
    }

    public function dataProviderForParseMultiple()
    {
        return array(
            array('
                @inbook{inbook,
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
                    }

                @incollection{incollection,
                  author       = {Peter Farindon},
                  title        = {The title of the work},
                  booktitle    = {The title of the book},
                  publisher    = {The name of the publisher},
                  year         = 1993,
                  editor       = {The editor},
                  volume       = 4,
                  series       = 5,
                  chapter      = 8,
                  pages        = {201-213},
                  address      = {The address of the publisher},
                  edition      = 3,
                  month        = 7,
                  note         = {An optional note}
                }',
                array('The title of the work', 'The title of the work'),
                array('chapter', 'chapter')
            ),
            array(
                '@manual{manual,
                  title        = {The title of the work},
                  author       = {Peter Gainsford},
                  organization = {The organization},
                  address      = {The address of the publisher},
                  edition      = 3,
                  month        = 7,
                  year         = 1993,
                  note         = {An optional note}
                }

                @mastersthesis{mastersthesis,
                  author       = {Peter Harwood},
                  title        = {The title of the work},
                  school       = {The school where the thesis was written},
                  year         = 1993,
                  address      = {The address of the publisher},
                  month        = 7,
                  note         = {An optional note}
                }

                @misc{misc,
                  author       = {Peter Isley},
                  title        = {The title of the work},
                  howpublished = {How it was published},
                  month        = 7,
                  year         = 1993,
                  note         = {An optional note}
                }

                @phdthesis{phdthesis,
                  author       = {Peter Joslin},
                  title        = {The title of the work},
                  school       = {The school where the thesis was written},
                  year         = 1993,
                  address      = {The address of the publisher},
                  month        = 7,
                  note         = {An optional note}
                }

                @proceedings{proceedings,
                  title        = {The title of the work},
                  year         = 1993,
                  editor       = {Peter Kidwelly},
                  volume       = 4,
                  series       = 5,
                  address      = {The address of the publisher},
                  month        = 7,
                  organization = {The organization},
                  publisher    = {The name of the publisher},
                  note         = {An optional note}
                }

                @techreport{techreport,
                  author       = {Peter Lambert},
                  title        = {The title of the work},
                  institution  = {The institution that published},
                  year         = 1993,
                  number       = 2,
                  address      = {The address of the publisher},
                  month        = 7,
                  note         = {An optional note}
                }

                @unpublished{unpublished,
                  author       = {Peter Marcheford},
                  title        = {The title of the work},
                  note         = {An optional note},
                  month        = 7,
                  year         = 1993
                }

                @conference{conference,
                  author       = {Peter Draper},
                  title        = {The title of the work},
                  booktitle    = {The title of the book},
                  year         = 1993,
                  editor       = {The editor},
                  volume       = 4,
                  series       = 5,
                  pages        = 213,
                  address      = {The address of the publisher},
                  month        = 7,
                  organization = {The organization},
                  publisher    = {The publisher},
                  note         = {An optional note}
                }

                @booklet{booklet,
                  title        = {The title of the work},
                  author       = {Peter Caxton},
                  howpublished = {How it was published},
                  address      = {The address of the publisher},
                  month        = 7,
                  year         = 1993,
                  note         = {An optional note}
                }

                ',
                array(
                    'The title of the work', 'The title of the work', 'The title of the work', 'The title of the work',
                    'The title of the work', 'The title of the work', 'The title of the work', 'The title of the work',
                    'The title of the work'
                ),
                array(
                    'book', 'thesis', 'unknown', 'thesis', 'paperConference', 'report', 'manuscript', 'conference',
                    'pamphlet'
                )
            )
        );
    }

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Parser::parse
     * @covers Geissler\Converter\Standard\BibTeX\Parser::extract
     * @covers Geissler\Converter\Standard\BibTeX\Parser::create
     */
    public function testMonth()
    {
        $input  =   '@booklet{booklet,
                  title        = {The title of the work},
                  author       = {Peter Caxton},
                  howpublished = {How it was published},
                  address      = {The address of the publisher},
                  month        = 7,
                  year         = 1993,
                  note         = {An optional note},
                  month        = {jan#"~8"}
                }';
        $this->assertTrue($this->object->parse($input));
        $entries    =   $this->object->retrieve();
        /** @var $entry \Geissler\Converter\Model\Entry */
        $entry  =   $entries[0];
        $dates  =   $entry->getIssued();
        /** @var $date \Geissler\Converter\Model\Date */
        $date   =   $dates[0];
        $this->assertEquals('1', $date->getMonth());
        $this->assertEquals('8', $date->getDay());
    }

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Parser::parse
     * @covers Geissler\Converter\Standard\BibTeX\Parser::extract
     * @covers Geissler\Converter\Standard\BibTeX\Parser::create
     */
    public function testLatexEscapes()
    {
        $input = <<<CITATION
@misc{JUSC1412888C,
    title = {Circulaire du 23 juillet 2014 relative {\`{a}} l'{\'{e}}tat civil},
    year = {2014},
    author = {Mohammed A{\"{i}}ssaoui}
}
CITATION;
        
        $this->assertTrue($this->object->parse($input));
        $entries    =   $this->object->retrieve();
        /** @var $entry \Geissler\Converter\Model\Entry */
        $entry  =   $entries[0];
        $title  =   $entry->getTitle();
        $this->assertEquals("Circulaire du 23 juillet 2014 relative à l'état civil", $title);

        /** @var $author \Geissler\Converter\Model\Person */
        $author = $entry->getAuthor()[0];
        $this->assertInstanceOf('\Geissler\Converter\Model\Person', $author);
        $this->assertEquals("Mohammed", $author->getGiven());
        $this->assertEquals("Aïssaoui", $author->getFamily());
    }

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Parser::parse
     * @covers Geissler\Converter\Standard\BibTeX\Parser::extract
     * @covers Geissler\Converter\Standard\BibTeX\Parser::create
     */
    public function testRemoveEnclosingBraces()
    {
        // Add redundant braces to the title and to the author.
        $input = <<<CITATION
@misc{JUSC1412888C,
    title = {{Circulaire du 23 juillet 2014 relative {\`{a}} l'{\'{e}}tat civil}},
    year = {2014},
    author = {{Mohammed A{\"{i}}ssaoui}}
}
CITATION;
        
        $this->assertTrue($this->object->parse($input));
        $entries    =   $this->object->retrieve();
        /** @var $entry \Geissler\Converter\Model\Entry */
        $entry  =   $entries[0];
        $title  =   $entry->getTitle();
        $this->assertEquals("Circulaire du 23 juillet 2014 relative à l'état civil", $title);

        /** @var $author \Geissler\Converter\Model\Person */
        $author = $entry->getAuthor()[0];
        $this->assertInstanceOf('\Geissler\Converter\Model\Person', $author);
        $this->assertEquals("Mohammed", $author->getGiven());
        $this->assertEquals("Aïssaoui", $author->getFamily());
    }    

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Parser::parse
     * @covers Geissler\Converter\Standard\BibTeX\Parser::extract
     * @covers Geissler\Converter\Standard\BibTeX\Parser::create
     */
    public function testUrls()
    {
        $inputs = array(
            "@misc{JUSC1412888C,
                title = {Circulaire du 23 juillet 2014 relative {\`{a}} l'{\'{e}}tat civil},
                year = {2014},
                url = {http://circulaire.legifrance.gouv.fr/pdf/2014/07/cir_38565.pdf}
            }",
            "@misc{JUSC1412888C,
                title = {Circulaire du 23 juillet 2014 relative {\`{a}} l'{\'{e}}tat civil},
                year = {2014},
                URL = {http://circulaire.legifrance.gouv.fr/pdf/2014/07/cir_38565.pdf}
            }"
        );
                
        foreach ($inputs as $input) {

            $this->assertTrue($this->object->parse($input));
            $entries    =   $this->object->retrieve();

            /** @var $entry \Geissler\Converter\Model\Entry */
            $entry = $entries[0];    
            $url  =   $entry->getURL();
            $this->assertEquals(
                "http://circulaire.legifrance.gouv.fr/pdf/2014/07/cir_38565.pdf", $url
            );
        }
    }

    /**
     * @covers Geissler\Converter\Standard\BibTeX\Parser::parse
     * @covers Geissler\Converter\Standard\BibTeX\Parser::extract
     * @covers Geissler\Converter\Standard\BibTeX\Parser::retrieve
     * 
     * @expectedException ErrorException
     */
    public function testParseNot()
    {
        $this->assertFalse($this->object->parse(''));
        $this->expectException(\ErrorException::class);
        $this->object->retrieve();
    }
}
