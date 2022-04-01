<?php

use Fuel\Core\Input;
use Fuel\Core\Response;

class Controller_App extends Controller_Template
{
    public function __construct()
    {
        if (!Auth::check()) {
            return Response::redirect('/login');
        }
    }
}