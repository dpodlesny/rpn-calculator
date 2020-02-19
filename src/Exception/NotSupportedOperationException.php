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

class NotSupportedOperationException extends Exception
{
    public const MESSAGE = 'Wrong operation. Supported operation are: %s';
}