<?php
    class Employer extends ActiveRecord
    {
        protected static $_table = 'employers';
        protected static $_relations = array (
            'user' => array (BELONGS_TO, 'User', 'id'),
            'createdWorks' => array (HAS_MANY, 'Work', 'empl_id'),
            'activeWorks' => array (HAS_MANY, 'Work', 'empl_id', ' AND status<2 ORDER BY status, created DESC'),
            'doneWorks' => array (HAS_MANY, 'Work', 'empl_id', ' AND status=3 ORDER BY created DESC'),
        );
    }
?>