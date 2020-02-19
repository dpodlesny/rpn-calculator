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
use RpnCalculator\Exception\WrongExpressionFormatException;
use RpnCalculator\RpnCalculatorFacadeInterface;
use RpnCalculator\RpnCalculatorFactory;

class FacadeNegativeTest extends TestCase
{
    /**
     * @dataProvider calculationWithWrongExpressionDataProvider
     *
     * @param string $expression
     *
     * @return void
     */
    public function testCalculationWithWrongExpression(string $expression): void
    {
        // Arrange
        $rpnCalculatorFacade = $this->createCalculatorFacade();

        // Assert
        $this->expectException(WrongExpressionFormatException::class);

        // Act
        $rpnCalculatorFacade->calculate($expression);
    }

    /**
     * @return string[][]
     */
    public function calculationWithWrongExpressionDataProvider(): array
    {
        return [
            'expression %' => ['5 8 %'],
            'expression **' => ['4 3 **'],
            'expression =' => ['234 22 ='],
            'expression with text, number and operator' => ['fsdf 435 +'],
            'expression with text' => ['fsdf'],
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
