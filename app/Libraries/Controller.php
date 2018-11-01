<?php
namespace App\Libraries;
/**
 * Created by PhpStorm.
 * User: Kapersky Guru
 * Date: 5/20/2018
 * Time: 2:17 AM
 */
 // use App\models;
class Controller
{
    // Load Model
    public function model($model)
    {
        $this->model = 'App\\Models\\'.$model;
        // Instantiate and return the model
        return new $this->model;

    }

    // Load Views
    public function view($view, $data = [])
    {
        if (file_exists('../app/Views/' . $view . '.php')) {
            require_once '../app/Views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}
