<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator;

interface RpnCalculatorFacadeInterface
{
    /**
     * @param string $expression
     *
     * @return float
     */
    public function calculate(string $expression): float;
}