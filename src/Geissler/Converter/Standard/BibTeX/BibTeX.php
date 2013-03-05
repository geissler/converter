<?php
namespace Geissler\Converter\Standard\BibTeX;

use Geissler\Converter\Standard\Basic\StandardAbstract;
use Geissler\Converter\Standard\BibTeX\Parser;
use Geissler\Converter\Standard\BibTeX\Creator;

/**
 * BibTeX.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 * @see http://en.wikipedia.org/wiki/BibTeX
 */
class BibTeX extends StandardAbstract
{
    /**
     * Constructor.
     *
     * @param string $data The data to parse.
     */
    public function __construct($data = '')
    {
        parent::__construct($data);
        $this->setParser(new Parser());
        $this->setCreator(new Creator());
    }
}
