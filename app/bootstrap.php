<?php

//Load Config
require_once 'config/config.php';
require_once '../vendor/autoload.php';

//Load up DOTENV file
$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

//AutoLoad libraries
spl_autoload_register(function ($className) {
    require_once 'libraries/' . $className . '.php';
});
