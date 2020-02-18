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
use RpnCalculator\Business\Validator\RpnCalculatorExpressionDataTransferValidatorInterface;
use RpnCalculator\Business\Validator\RpnCalculatorExpressionValueValidatorInterface;
use RpnCalculator\Exception\WrongExpressionFormatException;
use RpnCalculator\RpnCalculatorConfig;

class RpnCalculatorExpressionMapper implements RpnCalculatorExpressionMapperInterface
{
    protected const EXPLODE_DELIMITER = ' ';

    /**
     * @var RpnCalculatorExpressionValueValidatorInterface
     */
    protected $rpnCalculatorExpressionValueValidator;

    /**
     * @var RpnCalculatorExpressionDataTransferValidatorInterface
     */
    protected $rpnCalculatorExpressionDataTransferValidator;

    /**
     * @param RpnCalculatorExpressionValueValidatorInterface        $rpnCalculatorExpressionValueValidator
     * @param RpnCalculatorExpressionDataTransferValidatorInterface $RpnCalculatorExpressionDataTransferValidator
     */
    public function __construct(
        RpnCalculatorExpressionValueValidatorInterface $rpnCalculatorExpressionValueValidator,
        RpnCalculatorExpressionDataTransferValidatorInterface $RpnCalculatorExpressionDataTransferValidator
    ) {
        $this->rpnCalculatorExpressionValueValidator = $rpnCalculatorExpressionValueValidator;
        $this->rpnCalculatorExpressionDataTransferValidator = $RpnCalculatorExpressionDataTransferValidator;
    }

    /**
     * @param string $expression
     *
     * @throws WrongExpressionFormatException
     *
     * @return RpnCalculatorExpressionDataTransfer
     */
    public function mapExpressionToDataTransfer(string $expression): RpnCalculatorExpressionDataTransfer
    {
        $rpnCalculatorExpressionDataTransfer = $this->createRpnCalculatorExpressionDataTransfer();

        $expressionDataArray = explode(static::EXPLODE_DELIMITER, $expression);

        if ($expressionDataArray === false) {
            throw new WrongExpressionFormatException(WrongExpressionFormatException::MESSAGE);
        }

        foreach ($expressionDataArray as $value) {
            if ($this->rpnCalculatorExpressionValueValidator->isValid($value) === false) {
                continue;
            }

            if (in_array($value, RpnCalculatorConfig::ALLOWED_OPERATIONS)) {
                $rpnCalculatorExpressionDataTransfer->setOperation($value);

                continue;
            }

            $rpnCalculatorExpressionDataTransfer->addValue((float)number_format((float)$value, 1));
        }

        if ($this->rpnCalculatorExpressionDataTransferValidator->isValid($rpnCalculatorExpressionDataTransfer) === false) {
            throw new WrongExpressionFormatException(WrongExpressionFormatException::MESSAGE);
        }

        return $rpnCalculatorExpressionDataTransfer;
    }

    /**
     * @return RpnCalculatorExpressionDataTransfer
     */
    protected function createRpnCalculatorExpressionDataTransfer(): RpnCalculatorExpressionDataTransfer
    {
        return new RpnCalculatorExpressionDataTransfer();
    }
}
