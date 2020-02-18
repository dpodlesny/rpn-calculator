<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator;

class RpnCalculatorConfig
{
    public const OPERATION_PLUS = '+';
    public const OPERATION_MINUS = '-';
    public const OPERATION_MULTIPLY = '*';
    public const OPERATION_DIVISION = '/';
    public const OPERATION_QUIT = 'q';

    public const ALLOWED_OPERATIONS = [
        self::OPERATION_PLUS,
        self::OPERATION_MINUS,
        self::OPERATION_MULTIPLY,
        self::OPERATION_DIVISION,
        self::OPERATION_QUIT,
    ];
}