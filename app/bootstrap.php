<?php
require_once dirname(__DIR__).'/vendor/autoload.php';

//Load up DOTENV file
$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
$dotenv->load();

//Load Config
require_once 'config/config.php';
require_once 'helpers/Helpers.php';
