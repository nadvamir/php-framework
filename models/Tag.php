<?php
    class Tag extends ActiveRecord
    {
        protected static $_table = 'tags';
        protected static $_relations = array (
            'employers' => array (MANY_MANY, 'User', 'e2tag_rel', 'to_id', 'from_id'),
            'freelancers' => array (MANY_MANY, 'User', 'f2tag_rel', 'to_id', 'from_id'),
            'works' => array (MANY_MANY, 'Work', 'w2tag_rel', 'to_id', 'from_id'),
        );
    }
?>