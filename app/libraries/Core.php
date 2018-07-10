<?php

/**
 * Created by PhpStorm.
 * User: Kapersky Guru
 * Date: 5/20/2018
 * Time: 1:09 AM
 */
class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
//        print_r($this->getURL());
        $url = $this->getURL();

        // Look for the Controller in Controllers folder
        if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {

            // If exist, Set as current Controller
            $this->currentController = ucwords($url[0]);

            // Unsetting $url[0]
            unset($url[0]);
        }

        // Require the controller file
        require_once '../app/controllers/' . $this->currentController . '.php';

        // Instantiate the controller class
        $this->currentController = new $this->currentController;

        // Checking for the second part of the url i.e $url[1]

        if (isset($url[1])) {
            if (method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];

                //Unset url[1]

                unset($url[1]);
            }
        }

        // Checking for the third part of the URL i.e $url[2]
        // Get Params, if any

        $this->params = $url ? array_values($url) : [];

        // call a callback function with param arrays
        // simply set parameters to the giving method inside the giving class
        // e.g function edit($id){
        //
        //  echo $id
        //
        // }
        // will print the value of id

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getURL()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}
