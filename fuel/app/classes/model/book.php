<?php

class Model_Book extends \Orm\Model
{
	protected static $_table_name = 'books';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

    protected static $_belongs_to = array(
        'author' => array(
            'key_from' => 'author_id',
            'model_to' => 'Model_Author',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );

}
