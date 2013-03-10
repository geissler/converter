<?php
namespace Geissler\Converter;

use Geissler\Converter\Interfaces\FormattingStandard;

/**
 * Main converter class.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Converter
{
    /**
     * Convert a literature format from one standard into an other.
     *
     * @param Interfaces\FormattingStandard $from
     * @param Interfaces\FormattingStandard $to
     * @return string
     */
    public function convert(FormattingStandard $from, FormattingStandard $to)
    {
        if ($from->parse() == true) {
            return $to->create($from->retrieve());
        }

        return 'Error! The data could not be parsed!';
    }
}
