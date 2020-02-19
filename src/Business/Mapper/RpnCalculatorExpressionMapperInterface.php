<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Business\Mapper;

use RpnCalculator\Business\DataTransfer\RpnCalculatorExpressionDataTransfer;

interface RpnCalculatorExpressionMapperInterface
{
    /**
     * @param string $expression
     *
     * @return RpnCalculatorExpressionDataTransfer
     */
    public function mapExpressionToDataTransfer(string $expression): RpnCalculatorExpressionDataTransfer;
}
