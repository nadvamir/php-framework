<?php
    class FileForm extends Form
    {
        protected $_meta = array (
            'id' => 'file_form',
            'method' => 'post', 
            'class' => 'general_form',
            'enctype' => 'multipart/form-data'
        );
        protected $_fields = array (
            'file' => array ('id' => 'file', 'type' => 'file', 'accept' => 'application/pdf'),
            'submit' => array ('type' => 'submit', 'value' => 'Submit!'),
        ); 
        protected $_labels = array (
            'file' => array ('label' => 'Select file: '),
        );
        protected $_rules = array (
            'file' => array ('_file' => array ('name' => 'file', 'uploadsDir' => 'uploads/', 'allowedTypes' => array ('application/pdf'), 'maxSize' => 10000000)),
            'submit' => array (),
        );
    }
?>