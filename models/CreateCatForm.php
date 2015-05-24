<?php
    class CreateCatForm extends Form
    {
        protected $_meta = array (
            'id' => 'cat_form',
            'method' => 'post', 
            'class' => 'general_form'
        );
        protected $_fields = array (
            'label' => array ('id' => 'label', 'type' => 'text', 'placeholder' => 'Enter the name'),
            'seo' => array ('id' => 'seo', 'type' => 'hidden', 'value' => '-'),
            'submit' => array ('type' => 'submit', 'value' => 'Submit!'),
        ); 
        protected $_labels = array (
            'label' => array ('label' => 'Category: '),
        );
        protected $_rules = array (
            'label' => array ('maxLength' => 63, 'minLength' => 3, 'noScript' => true),
            'seo' => array (),
            'submit' => array (),
        );
    }
?>