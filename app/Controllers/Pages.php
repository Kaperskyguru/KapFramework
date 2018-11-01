<?php
namespace App\Controllers;
use App\Libraries\Controller;
/**
 * Created by PhpStorm.
 * User: Kapersky Guru
 * Date: 5/20/2018
 * Time: 1:47 AM
 */

class Pages extends Controller
{
    public function __construct()
    {
        $this->pageModel = $this->model('Page');
    }

    public function index()
    {
        $this->view('pages/index');
    }

    public function about()
    {
        $this->view('pages/about');
    }

}
