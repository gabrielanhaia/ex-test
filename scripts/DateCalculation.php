<?php

use App\DateCalculation\DateCalculation;

require_once('autoloader.php');

$dateCalculation = new DateCalculation;

// -- Variable date example.----------------------------------------

// You can change the dates bellow. ($dateTimeTest) ----------
$dateTimeTest = new \DateTime('2019-11-23 20:00:00');

try {
    $nextDay = $dateCalculation->calculateNextDay($dateTimeTest);
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
$configurableDate = $nextDay->format('Y-m-d H:i:s');
echo "based on variable date: {$configurableDate}\n";
// ------------------------------------------------------------------


// -- Current date example. -----------------------------------------
// You can change the dates bellow. ($dateTimeTest)
try {
    $nextDayBasedOnCurrentDate = $dateCalculation->calculateNextDay();
} catch (Exception $e) {
    echo $e->getMessage();
    die;
}
$configurableDate = $nextDayBasedOnCurrentDate->format('Y-m-d H:i:s');
echo "based on current date: {$configurableDate}\n";
// ------------------------------------------------------------------

