<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Exception;

use Exception;

class WrongExpressionFormatException extends Exception
{
    public const MESSAGE = 'Wrong expression format. Supported format: "3 3 +" or single line number or operation. Supported operation are: %s';
}