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

interface RpnCalculatorExpressionDataTransferValidatorInterface
{
    /**
     * @param RpnCalculatorExpressionDataTransfer $rpnCalculatorExpressionDataTransfer
     *
     * @return bool
     */
    public function isValid(RpnCalculatorExpressionDataTransfer $rpnCalculatorExpressionDataTransfer): bool;
}
