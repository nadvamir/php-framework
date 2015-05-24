<?php
    class Reply extends ActiveRecord
    {
        protected static $_table = 'replies';
        protected static $_relations = array (
            'author' => array (BELONGS_TO, 'User', 'uid'),
            'work' => array (BELONGS_TO, 'Work', 'work_id'),
        );
    }
?>