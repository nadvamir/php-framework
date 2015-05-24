<?php
    class Application extends ActiveRecord
    {
        protected static $_table = 'applications';
        protected static $_relations = array (
            'from' => array (BELONGS_TO, 'User', 'frlnc_id'),
            'work' => array (BELONGS_TO, 'Work', 'work_id')
        );
        
        // status 0: pending
        // status 1: accepted
        // status 2: declined
        // status 3: finished
    }
?>