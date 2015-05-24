<?php
    class Freelancer extends ActiveRecord
    {
        protected static $_table = 'freelancers';
        protected static $_relations = array (
            'user' => array (BELONGS_TO, 'User', 'id'),
            'worksInProgress' => array (HAS_MANY, 'Application', 'frlnc_id', ' AND status=1 ORDER BY created DESC'),
            'worksPending' => array (HAS_MANY, 'Application', 'frlnc_id', ' AND status=0 ORDER BY created DESC'),
            'worksDone' => array (HAS_MANY, 'Application', 'frlnc_id', ' AND status=3 ORDER BY created DESC'),
            'worksCancelled' => array (HAS_MANY, 'Application', 'frlnc_id', ' AND status=2 ORDER BY created DESC'),
        );
    }
?>