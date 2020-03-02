<?php

require_once('autoloader.php');

try {
    $fizzBuzz = new App\FizzBuzz\FizzBuzz();
    $fizzBuzzResults = $fizzBuzz->findMultiplesWithGenerator(1, 1000000);
} catch (\Exception $e) {
    echo $e->getMessage();
    die;
}

foreach ($fizzBuzzResults as $fizzBuzzResult) {
    echo "{$fizzBuzzResult}\n";
}