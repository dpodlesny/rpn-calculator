# Command-line reverse polish notation (RPN) calculator

Current version supports:
 * php-cli

## Installation
You can install it via composer: 
```
composer require dpodlesny/rpn-calculator
```

## Requirement
- PHP 7.2

## How to use
Run command in terminal ```php bin/rpn-calculator``` from the module folder.

Then follow the instruction

or

Use in your project:

```$rpnCalculatorFacade = (new RpnCalculatorFactory)->createRpnCalculatorFacade()```

And feel free to call any of Facade's public functions that you need.

You can easily extend any business logic by overwriting the class and the factory method.
