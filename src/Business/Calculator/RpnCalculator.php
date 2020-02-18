<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Business\Calculator;

use RpnCalculator\Business\Mapper\RpnCalculatorExpressionMapperInterface;
use RpnCalculator\Exception\NotSupportedOperationException;
use RpnCalculator\RpnCalculatorConfig;

class RpnCalculator implements RpnCalculatorInterface
{
    /**
     * Set 0 to limitless stack
     */
    protected const STACK_LIMIT = 2;

    /**
     * @var float[]
     */
    protected $stack = [];

    /**
     * @var RpnCalculatorExpressionMapperInterface
     */
    protected $rpnCalculatorExpressionMapper;

    /**
     * @param RpnCalculatorExpressionMapperInterface $rpnCalculatorExpressionMapper
     */
    public function __construct(RpnCalculatorExpressionMapperInterface $rpnCalculatorExpressionMapper)
    {
        $this->rpnCalculatorExpressionMapper = $rpnCalculatorExpressionMapper;
    }

    /**
     * @param string $expression
     *
     * @throws NotSupportedOperationException
     *
     * @return float
     */
    public function calculate(string $expression): float
    {
        $dataTransfer = $this->rpnCalculatorExpressionMapper->mapExpressionToDataTransfer($expression);

        $result = $dataTransfer->getCurrentValue();

        if ($dataTransfer->getOperation() === null) {
            $this->updateStack($result);

            return $result;
        }

        if ($dataTransfer->isValuesEmpty() && $dataTransfer->getOperation() !== null && count($this->stack) > 1) {
            $result = $this->processValuesByOperation($this->stack, $dataTransfer->getOperation());
        } elseif ($dataTransfer->getCount() === 1 && $dataTransfer->getOperation() !== null) {
            $result = $this->processValuesByOperation(
                array_merge($this->stack, $dataTransfer->getValues()),
                $dataTransfer->getOperation()
            );
        } elseif ($dataTransfer->getCount() > 1 && $dataTransfer->getOperation() !== null) {
            $result = $this->processValuesByOperation($dataTransfer->getValues(), $dataTransfer->getOperation());
        }

        $result = (float)number_format((float)$result, 1, '.', '');

        $this->stack = [$result];

        return $result;
    }

    /**
     * @param float[] $values
     * @param string  $operation
     *
     * @throws NotSupportedOperationException
     *
     * @return float
     */
    protected function processValuesByOperation(array $values, string $operation): float
    {
        if ($operation === RpnCalculatorConfig::OPERATION_PLUS) {
            return array_sum($values);
        }

        if ($operation === RpnCalculatorConfig::OPERATION_MULTIPLY) {
            return array_product($values);
        }

        if ($operation === RpnCalculatorConfig::OPERATION_MINUS) {
            $result = current($values);

            foreach (array_slice($values, 1) as $value) {
                $result -= $value;
            }

            return $result;
        }

        if ($operation === RpnCalculatorConfig::OPERATION_DIVISION) {
            $result = current($values);

            foreach (array_slice($values, 1) as $value) {

                $result /= $value;
            }

            return $result;
        }

        throw new NotSupportedOperationException(
            sprintf(NotSupportedOperationException::MESSAGE, implode(',', RpnCalculatorConfig::ALLOWED_OPERATIONS))
        );
    }

    /**
     * @param float $result
     */
    protected function updateStack(float $result): void
    {
        if (count($this->stack) < static::STACK_LIMIT || static::STACK_LIMIT === 0) {
            $this->stack[] = $result;

            return;
        }

        array_shift($this->stack);
        $this->stack[] = $result;
    }
}
