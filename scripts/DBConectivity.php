<?php

require_once('autoloader.php');
require_once('./vendor/autoload.php');

use App\DBConectivity\Core\Orm\Manager\EntityManager;

// This is an external package for reading the .ENV file.
$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

$entityManager = new EntityManager;

// The second parameter are the filters.
$result = $entityManager->get('exads_test');

print_r($result);