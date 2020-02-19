<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Tests\Unit;

use PHPUnit\Framework\TestCase;
use RpnCalculator\RpnCalculatorFacadeInterface;
use RpnCalculator\RpnCalculatorFactory;

class FacadePositiveTest extends TestCase
{
    /**
     * @dataProvider calculationWithFullExpressionDataProvider
     *
     * @param string $expression
     * @param float $expectedResult
     *
     * @return void
     */
    public function testCalculationWithFullExpression(string $expression, float $expectedResult): void
    {
        // Arrange
        $rpnCalculatorFacade = $this->createCalculatorFacade();

        // Act
        $result = $rpnCalculatorFacade->calculate($expression);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider calculationWithSplittedExpressionDataProvider
     *
     * @param string $expression1
     * @param string $expression2
     * @param string $expression3
     * @param float $expectedResult
     *
     * @return void
     */
    public function testCalculationWithSplittedExpression(
        string $expression1,
        string $expression2,
        string $expression3,
        float $expectedResult
    ): void
    {
        // Arrange
        $rpnCalculatorFacade = $this->createCalculatorFacade();

        // Act
        $rpnCalculatorFacade->calculate($expression1);
        $rpnCalculatorFacade->calculate($expression2);
        $result = $rpnCalculatorFacade->calculate($expression3);

        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider calculationWithManySplittedExpressionDataProvider
     *
     * @param string $expression1
     * @param string $expression2
     * @param string $expression3
     * @param string $expression4
     * @param float $expectedResult
     *
     * @return void
     */
    public function testCalculationWithManySplittedExpression(
        string $expression1,
        string $expression2,
        string $expression3,
        string $expression4,
        float $expectedResult
    ): void
    {
        // Arrange
        $rpnCalculatorFacade = $this->createCalculatorFacade();

        // Act
        $rpnCalculatorFacade->calculate($expression1);
        $rpnCalculatorFacade->calculate($expression2);
        $rpnCalculatorFacade->calculate($expression3);
        $result = $rpnCalculatorFacade->calculate($expression4);


        // Assert
        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @return string[][]|float[][]
     */
    public function calculationWithFullExpressionDataProvider(): array
    {
        return [
            'expression with integers with plus operation' => ['5 8 +', 13],
            'expression with floats with plus operation' => ['1.2 3.5 +', 4.7],
            'expression with integers with minus operation' => ['254 54 -', 200],
            'expression with floats with minus operation' => ['876.4 76.4 -', 800],
            'expression with integers with multiply operation' => ['10 33 *', 330],
            'expression with floats with multiply operation' => ['54.3 234.5 *', 12733.4],
            'expression with integers with divide operation' => ['788 8 /', 98.5],
            'expression with floats with divide operation' => ['86.4 2.2 /', 39.3],
        ];
    }

    /**
     * @return string[][]|float[][]
     */
    public function calculationWithSplittedExpressionDataProvider(): array
    {
        return [
            'expression with integers with plus operation' => ['5', '8', '+', 13],
            'expression with floats with plus operation' => ['1.2', '3.5', '+', 4.7],
            'expression with integers with minus operation' => ['254', '54', '-', 200],
            'expression with floats with minus operation' => ['876.4', '76.4', '-', 800],
            'expression with integers with multiply operation' => ['10', '33', '*', 330],
            'expression with floats with multiply operation' => ['54.3', '234.5', '*', 12733.4],
            'expression with integers with divide operation' => ['788', '8', '/', 98.5],
            'expression with floats with divide operation' => ['86.4', '2.2', '/', 39.3],
        ];
    }

    /**
     * @return string[][]|float[][]
     */
    public function calculationWithManySplittedExpressionDataProvider(): array
    {
        return [
            'expression with integers with plus operation' => ['2', '5', '8', '+', 13],
            'expression with floats with plus operation' => ['43', '1.2', '3.5', '+', 4.7],
            'expression with integers with minus operation' => ['349', '254', '54', '-', 200],
            'expression with floats with minus operation' => ['3', '876.4', '76.4', '-', 800],
            'expression with integers with multiply operation' => ['534', '10', '33', '*', 330],
            'expression with floats with multiply operation' => ['12', '54.3', '234.5', '*', 12733.4],
            'expression with integers with divide operation' => ['8', '788', '8', '/', 98.5],
            'expression with floats with divide operation' => ['43', '86.4', '2.2', '/', 39.3],
        ];
    }

    /**
     * @return RpnCalculatorFacadeInterface
     */
    protected function createCalculatorFacade(): RpnCalculatorFacadeInterface
    {
        return (new RpnCalculatorFactory)->createRpnCalculatorFacade();
    }
}
