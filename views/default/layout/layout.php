<?php
    if (!defined ('AJAX'))
    {
        include $_header;
        include getWidget ('logo');
        include $_main;
        include $_footer;
    }
    else
    {
        echo 'PLAIN_HTML';
        include $_main;
    }
?>