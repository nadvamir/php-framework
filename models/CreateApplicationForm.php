<?php
    class CreateApplicationForm extends Form
    {
        protected $_meta = array (
            'id' => 'create_work_form',
            'method' => 'post', 
            'class' => 'general_form'
        );
        protected $_fields = array (
            'work_id' => array ('id' => 'work_id', 'type' => 'hidden', 'value' => null),
            'frlnc_id' => array ('id' => 'frlnc_id', 'type' => 'hidden', 'value' => null),
            'description' => array ('id' => 'description', 'type' => 'textarea', 'rows' => 15, 'placeholder' => 'Write why you should be chosen for this assignment'),
            'submit' => array ('type' => 'submit', 'value' => 'Submit!'),
        ); 
        protected $_labels = array (
            'description' => array ('label' => 'Motivation: '),
        );
        protected $_rules = array (
            'work_id' => array ('integer' => true, 'notNull' => true),
            'frlnc_id' => array ('integer' => true, 'notNull' => true),
            'description' => array ('maxLength' => 4095, 'minLength' => 3, 'noScript' => true),
            'submit' => array (),
        );
    }
?>