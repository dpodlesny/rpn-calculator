<?php
/**
 * @author Denys Podliesnyi <underwood.dv@gmail.com>
 *
 * @license MIT
 *
 * @link https://github.com/dpodlesny/rpn-calculator
 */

namespace RpnCalculator\Command;

use RpnCalculator\RpnCalculatorFacadeInterface;
use Throwable;

class RpnCalculatorCommand implements RpnCalculatorCommandInterface
{
    protected const ERROR_MESSAGE = 'Some error happened while executing command. Please try again.';

    /**
     * @var \RpnCalculator\RpnCalculatorFacadeInterface
     */
    protected $rpnCalculatorFacade;

    /**
     * @param RpnCalculatorFacadeInterface $rpnCalculatorFacade
     */
    public function __construct(RpnCalculatorFacadeInterface $rpnCalculatorFacade)
    {
        $this->rpnCalculatorFacade = $rpnCalculatorFacade;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        echo ' CLI RPN Calculator ';
        echo PHP_EOL;
        echo ' ***************************** ';
        echo PHP_EOL;

        $this->calculate();
    }

    /**
     * @return void
     */
    protected function calculate(): void
    {
        do {
            $handle = fopen('php://stdin', 'r');

            if ($handle === false) {
                echo static::ERROR_MESSAGE;

                break;
            }

            $x = fgets($handle);

            if ($x === false) {
                echo static::ERROR_MESSAGE;

                break;
            }

            $x = strtolower(trim($x));
            fclose($handle);

            try {
                echo $this->rpnCalculatorFacade->calculate($x);
            } catch (Throwable $exception) {
                echo $exception->getMessage();
            }

            echo PHP_EOL;
        } while ($x !== 'q');
    }
}