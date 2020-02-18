<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Business\DataTransfer;

class RpnCalculatorExpressionDataTransfer
{
    /**
     * @var float[]
     */
    protected $values = [];

    /**
     * @var string|null
     */
    protected $operation = null;

    /**
     * @return float[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return count($this->values);
    }

    /**
     * @return float
     */
    public function getCurrentValue(): float
    {
        if ($this->getCount() === 0) {
            return 0.0;
        }

        return current($this->values);
    }

    /**
     * @return bool
     */
    public function isValuesEmpty(): bool
    {
        return count($this->values) === 0;
    }

    /**
     * @param float $value
     *
     * @return RpnCalculatorExpressionDataTransfer
     */
    public function addValue(float $value): RpnCalculatorExpressionDataTransfer
    {
        $this->values[] = $value;

        return $this;
    }

    /**
     * @param float[] $values
     *
     * @return RpnCalculatorExpressionDataTransfer
     */
    public function setValues(array $values): RpnCalculatorExpressionDataTransfer
    {
        $this->values = $values;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }

    /**
     * @param string $operation
     *
     * @return RpnCalculatorExpressionDataTransfer
     */
    public function setOperation(string $operation): RpnCalculatorExpressionDataTransfer
    {
        $this->operation = $operation;

        return $this;
    }
}