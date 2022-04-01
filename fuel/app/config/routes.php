<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.9-dev
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'welcome/index',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),

    'book' => ['book/index', 'name' => 'book_index'],
    'book/create' => ['book/create', 'name' => 'book_create'],
    'book(/:id)/edit' => ['book/edit$1', 'name' => 'book_edit'],
    'book(/:id)/delete' => ['book/delete$1', 'name' => 'book_delete'],

    'author' => ['author/index', 'name' => 'author_index'],
    'author/create' => ['author/create', 'name' => 'author_create'],
    'author(/:id)/edit' => ['author/edit$1', 'name' => 'author_edit'],
    'author(/:id)/delete' => ['author/delete$1', 'name' => 'author_delete'],

    'register' => ['auth/register', 'name' => 'register'],
    'login' => ['auth/login', 'name' => 'login'],
    'logout' => ['auth/logout', 'name' => 'logout'],
);
