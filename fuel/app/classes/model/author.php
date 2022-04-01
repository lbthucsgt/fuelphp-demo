<?php

class Model_Author extends \Orm\Model
{
	protected static $_table_name = 'authors';

	protected static $_primary_key = array('id');

	protected static $_has_many = array(
        'books' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Book',
            'key_to' => 'author_id',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
	);

	protected static $_many_many = array(
	);

	protected static $_has_one = array(
	);

    protected static $_belongs_to = array(
    );
}
