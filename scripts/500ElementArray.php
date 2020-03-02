<?php

require_once('autoloader.php');

// You can change the variable above (Total of random items at the list)
$totalRandomNumberArray = 500;

try {
    $randomFirstNumber = rand(1, 1000000);
    // TODO: Remove
    $lastNumber = $randomFirstNumber + ($totalRandomNumberArray - 1);
    $randomOrderedList = range($randomFirstNumber, $lastNumber);

    // Remove only numbers between the sequence (never the first or last).
    $indexToBeRemoved = rand(1, ($totalRandomNumberArray - 2));
    unset($randomOrderedList[$indexToBeRemoved]);

    $findMissingValueArray = new App\FindMissingValueArray\FindMissingValueArray;
    $missingValue = $findMissingValueArray->searchForMissingValue($randomOrderedList);
} catch (\Exception $e) {
    print_r($e->getMessage());
    die;
}

echo $missingValue;