<?php

use Fuel\Core\Input;
use Fuel\Core\Response;

class Controller_Book extends Controller_App
{
    public function action_index()
    {
        $query = Model_Book::query()
            ->related('author')
            ->order_by('id', 'desc');

        $title = Input::get('title');
        $words = preg_split('/\s+/u', $title, -1, PREG_SPLIT_NO_EMPTY);
        if (!empty($words)) {
            foreach ($words as $word) {
                $query->or_where('title', 'like', '%' . $word . '%');
            }
        }

        $config = array(
            //'pagination_url' => '/book/', //fuel php automatically build
            'total_items'    => (clone $query)->count(),
            'per_page'       => 4,
            'uri_segment'    => 'page',
        );

        $pagination = \Fuel\Core\Pagination::forge('mypagination', $config);
        $data['pagination'] = $pagination;

        $data['books'] = $query->rows_offset($pagination->offset)
            ->rows_limit($pagination->per_page)
            ->get();

        $this->template->content = View::forge('book/index', $data);
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
    }

    public function action_delete($id)
    {
        $book = Model_Book::find($id);

        // Delete old image
        if (!empty($book->cover)) {
            @unlink(DOCROOT . 'cover/' . $book->cover);
        }

        $book->delete();
        Session::set_flash('success', 'The book has been deleted!');
        $redirectUrl = Input::post('redirect_url');
        if ($redirectUrl) {
            Response::redirect($redirectUrl);
        }

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

                // Delete old image
                if (!empty($book->cover)) {
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
