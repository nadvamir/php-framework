<?php
    class Page extends ActiveRecord
    {
        protected static $_table = 'categories';
        protected static $_relations = array (
            'parent' => array (BELONGS_TO, 'Page', 'pid'),
            'previous' => array (BELONGS_TO, 'Page', 'prev_id'),
            'next' => array (HAS_MUTABLE_ONE, 'Page', 'prev_id'),
        );
    }

?>