<?php
namespace Geissler\Converter\Standard\CSL;

use Geissler\Converter\Standard\Basic\StandardAbstract;
use Geissler\Converter\Standard\CSL\Parser;
use Geissler\Converter\Standard\CSL\Creator;

/**
 * CSL (Citation style language)
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 * @link http://citationstyles.org/
 */
class CSL extends StandardAbstract
{
    /**
     * Constructor.
     *
     * @param string $data The data to parse.
     */
    public function __construct($data = '')
    {
        parent::__construct($data);
        $this->setCreator(new Creator());
        $this->setParser(new Parser());
    }
}
