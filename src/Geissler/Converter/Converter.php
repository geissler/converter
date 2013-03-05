<?php
namespace Geissler\Converter;

use Geissler\Converter\Interfaces\FormattingStandard;

/**
 * Converter.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Converter
{
    /**
     * Convert the literature format in one standard into an other.
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
