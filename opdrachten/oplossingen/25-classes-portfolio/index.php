<?php

    function __autoload($className){
        include_once 'classes/'. $className . '.php';
    }

    $body = (isset($_GET['page'])? $_GET['page']: 'index'). '-body.html';
    $page = new HTMLBuilder('header.html', $body, 'footer.html');
?>