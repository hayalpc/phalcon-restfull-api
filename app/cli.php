<?php

use Phalcon\Di\FactoryDefault\Cli as CliDI;
use Phalcon\Cli\Console as ConsoleApp;
use Phalcon\Loader;


// Using the CLI factory default services container
$di = new CliDI();

$arrBasePath = preg_split("/\//", __DIR__);
$limit = sizeof($arrBasePath);

$strBasePath = "";
for ($count = 0; $count < $limit - 1; $count++) {
    $strBasePath .= $arrBasePath[$count] . '/';
}

define('BASE_PATH', $strBasePath);
define('APP_PATH', BASE_PATH . '/app');

/**
 * Register the autoloader and tell it to register the tasks directory
 */
/*$loader = new Loader();

$loader->registerDirs(
    [
        __DIR__ . "/tasks",
        __DIR__ . "/models",
        __DIR__ . "/controllers"
    ]
);

$loader->register();*/

include BASE_PATH . 'app/config/services.php';
$config = $di->getConfig();

$loader = new Loader();

$loader->registerDirs(
    [
        __DIR__ . "/tasks",
        __DIR__ . "/models",
    ]
);

$loader->registerNamespaces(
    [
        "App\Models" => __DIR__ . "/models",
        "App\Tasks" => __DIR__ . "/tasks"
    ]
);

$loader->register();


// Create a console application
$console = new ConsoleApp();
$console->setDI($di);

//Process the console arguments
$arguments = [];
foreach ($argv as $k => $arg) {
    if ($k == 1) {
        $arguments["task"] = $arg;
    } elseif ($k == 2) {
        $arguments["action"] = $arg;
    } elseif ($k >= 3) {
        $arguments["params"][] = $arg;
    }
}

try {
    // Handle incoming arguments
    $console->handle($arguments);
} catch (\Phalcon\Exception $e) {
    echo $e->getMessage();
    exit(255);
}