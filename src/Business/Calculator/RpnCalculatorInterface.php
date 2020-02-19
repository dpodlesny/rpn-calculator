<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Business\Calculator;

interface RpnCalculatorInterface
{
    /**
     * @param string $expression
     *
     * @return float
     */
    public function calculate(string $expression): float;
}
