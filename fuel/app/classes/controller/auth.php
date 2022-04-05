<?php

use Fuel\Core\Input;
use Fuel\Core\Response;

class Controller_Auth extends Controller_Template
{
    public function __construct()
    {
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

    public function action_login()
    {
        if (Input::post()) {
            if (Auth::login(Input::post('email'), Input::post('password')))
            {
                Response::redirect('/book');
            }
        }
        $this->template->content = View::forge('auth/login');
        $this->template->formSuccess = View::forge('layouts/form-success');
    }

    public function action_logout()
    {
        Auth::logout();
        Response::redirect('/login');
    }

    public function action_register()
    {
        if (Input::post()) {
            Auth::create_user(
                Input::post('username'),
                Input::post('password'),
                Input::post('email'),
                1
            );
            Session::set_flash('success', 'User has been regitered!');
            Response::redirect('/login');
        }

        $this->template->content = View::forge('auth/register');
    }
}