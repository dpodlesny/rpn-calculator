<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Business\Validator;

use RpnCalculator\RpnCalculatorConfig;

class RpnCalculatorExpressionOperationValidator implements RpnCalculatorExpressionOperationValidatorInterface
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        return in_array($value, RpnCalculatorConfig::ALLOWED_OPERATIONS);
    }
}
