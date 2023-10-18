<?php
// start session
    session_start();
    require_once('config.php');
    require_once('functions/account.php');
    $LoginHandler = new LoginHandler;


    include_once('../modules/header.php');

    $_SESSION['is_loggedin_check'] = '';
    // $_SESSION['is_loggedin_check'] = 'loggedin';
    $LoginHandler->isUserLoggedIn();

    include_once('../modules/footer.php');
?>