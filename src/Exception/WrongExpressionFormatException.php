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
    public const MESSAGE = 'Wrong expression format. Format must be space separated numbers\operation e.x. "3 3 +" or single line number or operation';
}