<?php
    // includes pagehandler from functions/pages.php
    require_once('functions/pages.php');
    $pageHandler = new pageHandler;

    // start session
    session_start();
    require_once('config.php');

    // print_r($_SESSION);




    $pageHandler->getPage();


