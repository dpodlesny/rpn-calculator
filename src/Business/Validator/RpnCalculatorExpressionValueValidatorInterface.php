<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Business\Validator;

interface RpnCalculatorExpressionValueValidatorInterface
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public function isValid(string $value): bool;
}
