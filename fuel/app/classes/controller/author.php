<?php

use Fuel\Core\Input;
use Fuel\Core\Response;

class Controller_Author extends Controller_App
{
    public function action_index()
    {
        $config = array(
            //'pagination_url' => '/author', //fuel php automatically build
            'total_items'    => Model_Author::count(),
            'per_page'       => 10,
            // 'uri_segment'    => 3,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = \Fuel\Core\Pagination::forge('author_pagination', $config);
        $data['authors'] = Model_Author::query()
            ->related('books')
            ->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->order_by('id', 'desc')
            ->get();

        $data['pagination'] = $pagination;

        $this->template->content = View::forge('author/index', $data);
        $this->template->formSuccess = View::forge('layouts/form-success');
    }

    public function action_create()
    {
        if (Input::post()) {
            $author = new Model_Author();
            $author->name = Input::post('name');
            $author->save();
            Session::set_flash('success', 'The author has been created!');
            Response::redirect('author/' . $author->id . '/edit');
        }

        $this->template->content = View::forge('author/create');
    }

    public function action_edit($id)
    {
        if (Input::post()) {
            $author = Model_Author::find($id);
            $author->name = Input::post('name');
            $author->save();
            Session::set_flash('success', 'The author has been updated!');
            Response::redirect('author/' . $author->id . '/edit');
        }

        $data['author'] = Model_Author::find($id);
        $this->template->content = View::forge('author/edit', $data);
        $this->template->formSuccess = View::forge('layouts/form-success');
    }

    public function action_delete($id)
    {
        $author = Model_Author::find($id);
        $author->delete();
        Session::set_flash('success', 'The author has been deleted!');

        Response::redirect('author');
    }
}
