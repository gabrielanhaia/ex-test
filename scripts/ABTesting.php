<?php

use App\ABTesting\ABTesting;

require_once('autoloader.php');
require_once('./vendor/autoload.php');

// This is an external package for reading the .ENV file.
$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();
// ------------------------------------------------------

$abTesting = new ABTesting;
$designToBeShowed = $abTesting->redirectThePage();
print_r($designToBeShowed);