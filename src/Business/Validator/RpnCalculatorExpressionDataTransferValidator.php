<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Business\Validator;

use RpnCalculator\Business\DataTransfer\RpnCalculatorExpressionDataTransfer;

class RpnCalculatorExpressionDataTransferValidator implements RpnCalculatorExpressionDataTransferValidatorInterface
{
    /**
     * @param RpnCalculatorExpressionDataTransfer $rpnCalculatorExpressionDataTransfer
     *
     * @return bool
     */
    public function isValid(RpnCalculatorExpressionDataTransfer $rpnCalculatorExpressionDataTransfer): bool
    {
        return $rpnCalculatorExpressionDataTransfer->getOperation() !== null || $rpnCalculatorExpressionDataTransfer->getCount() === 1;
    }
}
