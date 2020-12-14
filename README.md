# bags-kata
Bags kata from [Katalyst website]

## Instalation and configuration

You must have at least PHP 7.4 and composer

### Install dependences

Install dependences with composer and resolve all issues that composer command responses.

```sh
$ composer install
```

### Play tests

Execute all test with composer option:

```sh
$ composer test
```

If you want to execute only one you can do it like this example in which you execute only the class CastBagSorterSpellTest

```sh
$ php ./vendor/phpunit/phpunit/phpunit ./tests/Application/CastBagSorterSpellTest.php --bootstrap ./vendor/autoload.php --no-configuration
```

# TO-DO

- Complete tests for other domain classes
- Fill more test cases for application class

[Katalyst website]: <https://katalyst.codurance.com/bags>
