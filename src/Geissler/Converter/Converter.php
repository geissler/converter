<?php
namespace Geissler\Converter;

use Geissler\Converter\Interfaces\FormattingStandard;

/**
 * The main converter class. Just inject an object of each standard and retrieve the converted value. You MUST inject
 * your input data into the constructor of the source (= $from) object.
 *
 * @author Benjamin Geißler <benjamin.geissler@gmail.com>
 * @license MIT
 */
class Converter
{
    /**
     * Convert a literature format from one standard into an other.
     *
     * @param Interfaces\FormattingStandard $from Inject the data to transfer into the constructor of this object
     * @param Interfaces\FormattingStandard $to Just set the object to transfer to
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
