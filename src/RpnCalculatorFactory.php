<?php
/**
 * @author  Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link    https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator;

use RpnCalculator\Command\RpnCalculatorCommandInterface;

class RpnCalculatorFactory
{
    /**
     * @return RpnCalculatorCommandInterface
     */
    public function createRpnCalculatorCommand(): RpnCalculatorCommandInterface
    {
        //@todo return
    }

    /**
     * @return RpnCalculatorFacadeInterface
     */
    public function createRpnCalculatorFacade(): RpnCalculatorFacadeInterface
    {
        //@todo return
    }
}
