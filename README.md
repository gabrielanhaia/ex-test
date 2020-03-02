[![CircleCI](https://circleci.com/gh/gabrielanhaia/exads/tree/master.svg?style=svg&circle-token=4d4445a2f5a510fd9f0d4084359db3748ef8cb75)](https://circleci.com/gh/gabrielanhaia/exads/tree/master)

![](https://img.shields.io/badge/test-passing-green)

# Exads
Exads test.

## Running it

1. Access the project director by terminal.
2. Install the composer dependencies: ```php composer.phar install``` 
3. Start a MySql database server and create a database empty.
3. Run the SQL scripts in the following order (Create and insert data tables): ```./scripts/ab_test.sql```, ```./scripts/data_calculation_test.sql```
4. Configure the file ```./.env``` with the database variables.

## Running the scripts

### 1. FizzBuzz
```php scripts/FizzBuzz.php```

### 2. 500 Element Array
```php scripts/500ElementArray.php```

### 3. Database Connectivity
```php scripts/DBConectivity.php```

### 4. Date Calculation
```php scripts/DateCalculation.php```

### 5. A/B Testing
```php scripts/ABTesting.php```

## Running unit tests

1. Access the project director by terminal.
2. Run ```php vendor/bin/phpunit tests```
