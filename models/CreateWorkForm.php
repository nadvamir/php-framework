<?php
    class CreateWorkForm extends Form
    {
        protected $_meta = array (
            'id' => 'create_work_form',
            'method' => 'post', 
            'class' => 'general_form'
        );
        protected $_fields = array (
            'cat_id' => array ('id' => 'cat_id', 'type' => 'hidden', 'value' => null),
            'empl_id' => array ('id' => 'empl_id', 'type' => 'hidden', 'value' => null),
            'seo' => array ('id' => 'seo', 'type' => 'hidden', 'value' => '-'),
            'label' => array ('id' => 'label', 'type' => 'text', 'placeholder' => 'Enter title of your assignment'),
            'excerpt' => array ('id' => 'excerpt', 'type' => 'textarea', 'rows' => 4, 'placeholder' => 'Short text to be displayed when listing assignments'),
            'description' => array ('id' => 'description', 'type' => 'textarea', 'rows' => 9, 'placeholder' => 'Full description of your assignment'),
            'status' => array ('id' => 'status', 'type' => 'select', 'value' => '0', 'options' => array (0 => 'Open', 1 => 'In progress', 2 => 'Cancelled', 3 => 'Finished')),
            'submit' => array ('type' => 'submit', 'value' => 'Submit!'),
        ); 
        protected $_labels = array (
            'label' => array ('label' => 'Title: '),
            'excerpt' => array ('label' => 'Excerpt: '),
            'description' => array ('label' => 'Description: '),
            'status' => array ('label' => 'Status: '),
        );
        protected $_rules = array (
            'cat_id' => array ('integer' => true, 'notNull' => true),
            'empl_id' => array ('integer' => true, 'notNull' => true),
            'seo' => array ('notNull' => true),
            'label' => array ('maxLength' => 255, 'minLength' => 3, 'noScript' => true),
            'excerpt' => array ('maxLength' => 255, 'minLength' => 3, 'noScript' => true),
            'description' => array ('maxLength' => 4095, 'minLength' => 3, 'noScript' => true),
            'status' => array ('integer' => true),
            'submit' => array (),
        );
    }
?>