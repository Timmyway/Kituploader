<?php
namespace App\Controllers;

class MainController extends Controller
{
    public function index($params)
    {
        echo 'Index page';
        var_dump($params);
    }
}