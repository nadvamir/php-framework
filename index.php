<?php
    // © Maksim Solovjov, 2011
    // it all started at the evening of 25/10/2011
    //----------------------------------------------------------------------------------------------
    // base directory constant
    define ('BASE_DIR', dirname (__FILE__).'/');
    // same constant, used for client side, such as including css
    define ('WEB_ROOT', 'http://localhost/ar/');
    // other constants
    include BASE_DIR.'system/constants.php';
    // system functions, most notably: __autoload
    include BASE_DIR.'system/func.php';
    
    // in ajax scenario, route will be provided in POST
    if (isset ($_POST['r']))
    {
        $_GET['r'] = $_POST['r'];
        define ('AJAX', true);
    }
    
    // initialising system
    System::init ();
?>
