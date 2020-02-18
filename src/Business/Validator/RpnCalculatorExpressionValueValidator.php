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

class RpnCalculatorExpressionValueValidator implements RpnCalculatorExpressionValueValidatorInterface
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool
    {
        return is_numeric($value) or in_array($value, RpnCalculatorConfig::ALLOWED_OPERATIONS);
    }
}
