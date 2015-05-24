<?php
    class Work extends ActiveRecord
    {
        protected static $_table = 'works';
        protected static $_relations = array (
            'category' => array (BELONGS_TO, 'Category', 'cat_id'),
            'employer' => array (BELONGS_TO, 'Employer', 'empl_id'),
            'freelancer' => array (BELONGS_TO, 'User', 'frlnc_id'),
            'applications' => array (HAS_MANY, 'Application', 'work_id'),
            'openApplications' => array (HAS_MANY, 'Application', 'work_id', ' AND status=0'),
            'givenApplications' => array (HAS_MANY, 'Application', 'work_id', ' AND status=1'),
            'rejectedApplications' => array (HAS_MANY, 'Application', 'work_id', ' AND status=2'),
            'completedApplications' => array (HAS_MANY, 'Application', 'work_id', ' AND status=3'),
            'replies' => array (HAS_MANY, 'Reply', 'work_id'),
            'tags' => array (MANY_MANY, 'Tag', 'w2tag_rel', 'from_id', 'to_id'),
        );
    }
?>