<?php

use Fuel\Core\Input;
use Fuel\Core\Response;

class Controller_Book extends Controller_App
{
    public function action_index()
    {
        $config = array(
            'pagination_url' => '/book/',
            'total_items'    => Model_Book::count(),
            'per_page'       => 4,
            // 'uri_segment'    => 3,
            // or if you prefer pagination by query string
            'uri_segment'    => 'page',
        );

        $pagination = \Fuel\Core\Pagination::forge('mypagination', $config);
        $data['books'] = Model_Book::query()
            ->related('author')
            ->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->order_by('id', 'desc')
            ->get();

        $data['pagination'] = $pagination;

        //$data['books'] = Model_Book::find('all', ['related' => 'author']);
        $this->template->content = View::forge('book/index', $data);
        $this->template->formSuccess = View::forge('layouts/form-success');
    }

    public function action_create()
    {
        if (Input::post()) {
            $book = new Model_Book();
            $book->title = Input::post('title');
            $book->price = Input::post('price');
            $book->published_at = Input::post('published_at');
            $book->author_id = Input::post('author_id');
            $book->save();
            $this->uploadImage($book);
            Session::set_flash('success', 'The book has been created!');
            Response::redirect('book/' . $book->id . '/edit');
        }

        $data['authors'] = Model_Author::find('all');
        $this->template->content = View::forge('book/create', $data);
    }

    public function action_edit($id)
    {
        if (Input::post()) {
            $book = Model_Book::find($id);
            $book->title = Input::post('title');
            $book->price = Input::post('price');
            $book->published_at = Input::post('published_at');
            $book->author_id = Input::post('author_id');
            $book->save();
            $this->uploadImage($book);
            Session::set_flash('success', 'The book has been updated!');
            Response::redirect('book/' . $book->id . '/edit');
        }

        $data['book'] = Model_Book::find($id);
        $data['authors'] = Model_Author::find('all');
        $this->template->content = View::forge('book/edit', $data);
        $this->template->formSuccess = View::forge('layouts/form-success');
        $this->template->formError = View::forge('layouts/form-error');
    }

    public function action_delete($id)
    {
        $book = Model_Book::find($id);
        $book->delete();
        Session::set_flash('success', 'The book has been deleted!');

        Response::redirect('book');
    }

    public function uploadImage($book)
    {
        $coverImage = Upload::get_files(0);
        if ($coverImage) {
            $imageInfo = explode('.', $coverImage['name']);
            $newImageName = $imageInfo[0] . '_' . time() . '.' . $imageInfo[1];

            $config = array(
                'path' => DOCROOT . 'cover',
                //'randomize' => true,
                'new_name' => $newImageName,
                'auto_rename' => false,
                'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
            );

            \Fuel\Core\Upload::process($config);
            if (Upload::is_valid()) {
                Upload::save();

                if (!empty($book->cover)) {
                    // Delete old image
                    @unlink(DOCROOT . 'cover/' . $book->cover);
                }
                $book->cover = $newImageName;
                $book->save();
            }
            foreach (Upload::get_errors() as $file)
            {
                Session::set_flash('error', $file['errors'][0]['message']);
            }
        }
    }
}
