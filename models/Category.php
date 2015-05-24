<?php
    class Category extends ActiveRecord
    {
        protected static $_table = 'categories';
        protected static $_relations = array (
            'works' => array (HAS_MANY, 'Work', 'cat_id', 'ORDER BY status, created DESC'),
            'firstWorks' => array (HAS_MANY, 'Work', 'cat_id', 'AND status <> 2 ORDER BY status, created DESC LIMIT 0, 9'),
            'burningWorks' => array (HAS_MANY, 'Work', 'cat_id', 'ORDER BY burning_from DESC'),
            'employers' => array (MANY_MANY, 'User', 'e2cat_rel', 'to_id', 'from_id'),
            'freelancers' => array (MANY_MANY, 'User', 'f2cat_rel', 'to_id', 'from_id'),
        );
    }

?>