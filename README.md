# Command-line reverse polish notation (RPN) calculator

Current version also supports:
 * php-cli

## Installation
You can install it via composer: 
```
composer require dpodlesny/rpn-calculator
```

## Requirement
- PHP 7.2

## How to use
Just type command in terminal ```php bin/calculate```
Then follow the instruction

or

Use in your project:

```$rpnCalculatorFacade = (new RpnCalculatorFactory)->createRpnCalculatorFacade()```

And feel free to call any of Facade's public functions that you need.
