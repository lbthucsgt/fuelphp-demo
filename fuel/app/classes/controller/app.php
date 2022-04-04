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

        if (Input::post()) {
            if ( ! \Security::check_token()) {
                Session::set_flash('error', 'Csrf did not match!');
                Response::redirect(\Uri::current());
            }
        }
    }

    public function before()
    {
        parent::before();
        $this->template->formError = View::forge('layouts/form-error');
        $this->template->formSuccess = View::forge('layouts/form-success');
    }
}