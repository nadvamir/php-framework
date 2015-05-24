<?php
    return array (
        // language
        'lang' => 'en',
        'langs' => array (
            'lt', 'en'
        ),
        // database configurations
        'db' => array (
            'host' => 'localhost',
            'dbname' => 'ar',
            'user' => 'root',
            'pass' => ''
        ),
        'ldap' => array (
            'enabled' => true,
            'host' => 'hostname', // ldap server
            'bindRdn' => 'don\'t remember...', // or null
            'bindPass' => 'password', // or null, ldap password
            'context' => array (''), // context to get registration from
        ),
        // additional configuration files
        'configs' => array (
            'site',
        ),
        // route configurations
        'route' => array (
            'default' => 'boards/index', // default 'index' controller
        ),
        // session and authentication
        'session' => array (
            'duration' => 3600 * 240,
        ),
        // Role Based Access Controll
        'RBAC' => array (
            'admin' => array (
                'children' => array (
                    'moderator',
                ),
            ),
            'moderator' => array (
                'children' => array (
                    'freelancer', 'employer'
                ),
            ),
            'employer' => array (
                'children' => array (
                    'user'
                ),
            ),
            'freelancer' => array (
                'children' => array (
                    'user'
                ),
            ),
            'user' => array (
                'children' => array (
                    'guest'
                ),
            ),
            'guest' => array (
                'children' => array (
                ),
            ),
        ),
        // default rbac element
        'defaultRole' => 'guest',
        
        'params' => array (),
    );
?>
