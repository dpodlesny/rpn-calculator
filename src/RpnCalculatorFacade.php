<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator;

use RpnCalculator\Business\Calculator\RpnCalculatorInterface;

class RpnCalculatorFacade implements RpnCalculatorFacadeInterface
{
    /**
     * @var \RpnCalculator\Business\Calculator\RpnCalculatorInterface
     */
    protected $rpnCalculator;

    /**
     * @param RpnCalculatorInterface $rpnCalculator
     */
    public function __construct(RpnCalculatorInterface $rpnCalculator)
    {
        $this->rpnCalculator = $rpnCalculator;
    }

    /**
     * @param string $expression
     *
     * @return float
     */
    public function calculate(string $expression): float
    {
        return $this->rpnCalculator->calculate($expression);
    }
}
