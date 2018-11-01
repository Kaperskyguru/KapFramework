<?php


    $uri = urldecode(
        parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );

    // echo __DIR__.'/public'.$uri;
    if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
        return false;
    }

    //$_GET['url'] = $uri;

    require_once __DIR__.'/public/index.php';
