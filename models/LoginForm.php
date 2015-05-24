<?php
    class LoginForm extends Form
    {
        protected $_meta = array (
            'id' => 'login_form',
            'method' => 'post', 
            'class' => 'general_form'
        );
        protected $_fields = array (
            'login' => array ('id' => 'login', 'class' => 'test_input', 'type' => 'text'),
            'password' => array ('id' => 'password', 'class' => 'test_input', 'type' => 'password'),
            'submit' => array ('type' => 'submit', 'value' => 'Log in!'),
        ); 
        protected $_labels = array (
            'login' => array ('label' => 'Username: '),
            'password' => array ('label' => 'Password: '),
        );
        protected $_rules = array (
            'login' => array ('login' => true, 'maxLength' => 32, 'minLength' => 3),
            'password' => array ('password' => true, 'maxLength' => 32, 'minLength' => 3),
            'submit' => array (),
        );
    }
?>