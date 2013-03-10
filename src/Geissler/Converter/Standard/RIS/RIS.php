<?php
namespace Geissler\Converter\Standard;

use Geissler\Converter\Standard\Basic\StandardAbstract;

/**
 * RIS.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class RIS extends StandardAbstract
{
    /**
     * Constructor.
     *
     * @param string $data The data to parse.
     */
    public function __construct($data = '')
    {
        parent::__construct($data);
    }
}
