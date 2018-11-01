<?php
//Setting up ENV function
function env($name){
    return getenv($name);
}
/**
 * Created by PhpStorm.
 * User: Kapersky Guru
 * Date: 5/21/2018
 * Time: 9:27 AM
 */

// Define app root
define('APPROOT', dirname(dirname(__FILE__)));

// Define Site URL e.g http://localhost/kapframework
define('SITEURL', env("SITEURL"));

// Define Site name
define('SITENAME', env("SITENAME"));
