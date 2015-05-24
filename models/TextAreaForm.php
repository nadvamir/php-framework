<?php
    class TextAreaForm extends Form
    {
        protected $_meta = array (
            'id' => 'text_area_form',
            'method' => 'post', 
            'class' => 'general_form'
        );
        protected $_fields = array (
            'info' => array ('id' => 'info', 'type' => 'textarea', 'rows' => 10, 'placeholder' => ''),
            'submit' => array ('type' => 'submit', 'value' => 'Submit!'),
        ); 
        protected $_labels = array (
            'info' => array ('label' => 'info: '),
        );
        protected $_rules = array (
            'info' => array ('maxLength' => 4095, 'minLength' => 3, 'noScript' => true),
            'submit' => array (),
        );
    }
?>