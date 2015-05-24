<?php
/**
 * basic form class, which creates a form, displays it and handles submission
 */
class Form
{
    protected $_meta = array ();
    protected $_fields = array ();
    protected $_values = array ();
    protected $_valid = true;
    
    $_fields = array (
        'login' => array (
            'type' => 'text',
            'label' => 'Login'
        ),
    );
    
    /**
     * magic getter, for accessing forms properties
     */
    public function __get ($name)
    {
        if (!isset ($this->_values[$name]))
            throw new Exception ('form field does not exist: '.$name);
        return $this->_values[$name];
    }
    
    
    /**
     * function, which gets parameters from user
     * returns true, if parameters were sent
     */
    public function retrieveData ()
    {
        // deciding on the way we retrieve data
        $method = &$_POST;
        if ($this->_meta['method'] == 'get')
            $method = &$_GET;
        if (!isset ($method[$this->_meta['id'].'_submitted']))
            return false;
        // getting the information for each field
        foreach ($this->_fields as $key => $val)
            // if a field is missing, make form invalid
            if (!isset ($method[$key]) || !$method[$key])
            {
                if (!isset ($val['value']))
                {
                    $this->_errors[$key] = 'required';
                    $this->_valid = false;
                }
                else
                    $this->_values[$key] = $val['value'];
            }
            else
                $this->_values[$key] = $method[$key];
        return true;
    }
};
?>