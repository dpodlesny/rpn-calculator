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
use RpnCalculator\Business\Validator\RpnCalculatorExpressionOperationValidatorInterface;
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
     * @var RpnCalculatorExpressionOperationValidatorInterface
     */
    protected $rpnCalculatorExpressionOperationValidator;

    /**
     * @param RpnCalculatorExpressionValueValidatorInterface $rpnCalculatorExpressionValueValidator
     * @param RpnCalculatorExpressionDataTransferValidatorInterface $rpnCalculatorExpressionDataTransferValidator
     * @param RpnCalculatorExpressionOperationValidatorInterface $rpnCalculatorExpressionOperationValidator
     */
    public function __construct(
        RpnCalculatorExpressionValueValidatorInterface $rpnCalculatorExpressionValueValidator,
        RpnCalculatorExpressionDataTransferValidatorInterface $rpnCalculatorExpressionDataTransferValidator,
        RpnCalculatorExpressionOperationValidatorInterface $rpnCalculatorExpressionOperationValidator
    )
    {
        $this->rpnCalculatorExpressionValueValidator = $rpnCalculatorExpressionValueValidator;
        $this->rpnCalculatorExpressionDataTransferValidator = $rpnCalculatorExpressionDataTransferValidator;
        $this->rpnCalculatorExpressionOperationValidator = $rpnCalculatorExpressionOperationValidator;
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
            if ($this->rpnCalculatorExpressionOperationValidator->isValid($value)) {
                $rpnCalculatorExpressionDataTransfer->setOperation($value);

                continue;
            }

            if ($this->rpnCalculatorExpressionValueValidator->isValid($value)) {
                $rpnCalculatorExpressionDataTransfer->addValue((float)number_format((float)$value, 1, '.', ''));

                continue;
            }

            throw new WrongExpressionFormatException(
                sprintf(WrongExpressionFormatException::MESSAGE, implode(',', RpnCalculatorConfig::ALLOWED_OPERATIONS))
            );
        }

        if ($this->rpnCalculatorExpressionDataTransferValidator->isValid($rpnCalculatorExpressionDataTransfer)) {
            return $rpnCalculatorExpressionDataTransfer;
        }

        throw new WrongExpressionFormatException(
            sprintf(WrongExpressionFormatException::MESSAGE, implode(',', RpnCalculatorConfig::ALLOWED_OPERATIONS))
        );
    }

    /**
     * @return RpnCalculatorExpressionDataTransfer
     */
    protected function createRpnCalculatorExpressionDataTransfer(): RpnCalculatorExpressionDataTransfer
    {
        return new RpnCalculatorExpressionDataTransfer();
    }
}
