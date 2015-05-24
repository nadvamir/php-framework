<?php
    class ApplStatusForm extends Form
    {
        protected $_meta = array (
            'id' => 'create_work_form',
            'method' => 'post', 
            'class' => 'general_form'
        );
        protected $_fields = array (
            'mark' => array ('id' => 'mark', 'type' => 'select', 'value' => '5', 'options' => array (1 => 'Not Acceptable', 2 => 'Lousy', 3 => 'Decent', 4 => 'Good', 5 => 'Excellent')),
            'submit' => array ('type' => 'submit', 'value' => 'Submit!'),
        ); 
        protected $_labels = array (
            'mark' => array ('label' => 'Mark: '),
        );
        protected $_rules = array (
            'mark' => array ('integer' => true, 'notNull' => true),
            'submit' => array (),
        );
    }
?>