<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Command;

interface RpnCalculatorCommandInterface
{
    /**
     * @return void
     */
    public function execute(): void;
}
