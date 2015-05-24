<?php
    class Document extends ActiveRecord
    {
        protected static $_table = 'documents';
        protected static $_relations = array (
            'work' => array (BELONGS_TO, 'Work', 'work_id'),
        );
    }
?>