<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator;

use RpnCalculator\Business\Calculator\RpnCalculator;
use RpnCalculator\Business\Calculator\RpnCalculatorInterface;
use RpnCalculator\Business\Mapper\RpnCalculatorExpressionMapper;
use RpnCalculator\Business\Mapper\RpnCalculatorExpressionMapperInterface;
use RpnCalculator\Business\Validator\RpnCalculatorExpressionDataTransferValidator;
use RpnCalculator\Business\Validator\RpnCalculatorExpressionDataTransferValidatorInterface;
use RpnCalculator\Business\Validator\RpnCalculatorExpressionOperationValidator;
use RpnCalculator\Business\Validator\RpnCalculatorExpressionOperationValidatorInterface;
use RpnCalculator\Business\Validator\RpnCalculatorExpressionValueValidator;
use RpnCalculator\Business\Validator\RpnCalculatorExpressionValueValidatorInterface;
use RpnCalculator\Command\RpnCalculatorCommand;
use RpnCalculator\Command\RpnCalculatorCommandInterface;

class RpnCalculatorFactory
{
    /**
     * @return RpnCalculatorCommandInterface
     */
    public function createRpnCalculatorCommand(): RpnCalculatorCommandInterface
    {
        return new RpnCalculatorCommand($this->createRpnCalculatorFacade());
    }

    /**
     * @return RpnCalculatorFacadeInterface
     */
    public function createRpnCalculatorFacade(): RpnCalculatorFacadeInterface
    {
        return new RpnCalculatorFacade($this->createRpnCalculator());
    }

    /**
     * @return RpnCalculatorInterface
     */
    public function createRpnCalculator(): RpnCalculatorInterface
    {
        return new RpnCalculator($this->createRpnCalculatorExpressionMapper());
    }

    /**
     * @return RpnCalculatorExpressionMapperInterface
     */
    public function createRpnCalculatorExpressionMapper(): RpnCalculatorExpressionMapperInterface
    {
        return new RpnCalculatorExpressionMapper(
            $this->createRpnCalculatorExpressionValueValidator(),
            $this->createRpnCalculatorExpressionDataTransferValidator(),
            $this->createRpnCalculatorExpressionOperationValidator()
        );
    }

    /**
     * @return RpnCalculatorExpressionValueValidatorInterface
     */
    public function createRpnCalculatorExpressionValueValidator(): RpnCalculatorExpressionValueValidatorInterface
    {
        return new RpnCalculatorExpressionValueValidator();
    }

    /**
     * @return RpnCalculatorExpressionOperationValidatorInterface
     */
    public function createRpnCalculatorExpressionOperationValidator(): RpnCalculatorExpressionOperationValidatorInterface
    {
        return new RpnCalculatorExpressionOperationValidator();
    }

    /**
     * @return RpnCalculatorExpressionDataTransferValidatorInterface
     */
    public function createRpnCalculatorExpressionDataTransferValidator(): RpnCalculatorExpressionDataTransferValidatorInterface
    {
        return new RpnCalculatorExpressionDataTransferValidator();
    }
}