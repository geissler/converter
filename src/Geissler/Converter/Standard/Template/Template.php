<?php
namespace Geissler\Converter\Standard\Template;

use Geissler\Converter\Standard\Basic\StandardAbstract;
use Geissler\Converter\Standard\Template\Parser;
use Geissler\Converter\Standard\Template\Creator;

/**
 * TODO: Template comment.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Template extends StandardAbstract
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
