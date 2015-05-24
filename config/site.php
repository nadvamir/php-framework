<?php
    return array (
        // theme
        'theme' => 'default',
        // top menu
        'top_menu' => array (
            'dashboard' => array (
                'href' => array ('user'),
                'title' => 'dashboard',
                'label' => 'dashboard',
            ),
            'boards' => array (
                'href' => array ('boards'),
                'title' => 'boards',
                'label' => 'boards',
            ),
            'students' => array (
                'href' => array ('students'),
                'title' => 'students',
                'label' => 'students',
            ),
            'researchers' => array (
                'href' => array ('researchers'),
                'title' => 'researchers',
                'label' => 'researchers',
            ),
            /*'rush' => array (
                'href' => array ('rush'),
                'title' => 'rush',
                'label' => 'rush',
            ),
            'test' => array (
                'href' => array ('test'),
                'title' => 'test',
                'label' => 'test',
            ),*/
        ),
        // admin top menu
        'admin_top_menu' => array (
            'admin' => array (
                'href' => array ('admin'),
                'title' => 'admin_title',
                'label' => 'admin_title',
            ),
            'builder' => array (
                'href' => array ('builder'),
                'title' => 'builder_title',
                'label' => 'builder_title',
            ),
            'data' => array (
                'href' => array ('data'),
                'title' => 'data_title',
                'label' => 'data_title',
            ),
            'users' => array (
                'href' => array ('users'),
                'title' => 'users_title',
                'label' => 'users_title',
            ),
        ),
        // site builder side menu
        'builder_side_menu' => array (
            'builder' => array (
                'href' => array ('builder', 'index'),
                'title' => 'site_tree',
                'label' => 'site_tree',
            ),
            'default.css' => array (
                'href' => array ('builder', 'edit', 'css', 'default'),
                'title' => 'edit_main_css',
                'label' => 'edit_main_css',
            ),
        ),
        // status values
        'statusVals' => array (
            'Open',
            'In progress',
            'Canceled',
            'Done'
        ),
    );
?>