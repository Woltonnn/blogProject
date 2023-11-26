<?php
// Requires
require_once('config.php');
require_once('functions/ini.php');
require_once('functions/connDB.php');
require_once('functions/pages.php');

// $_SESSION['user_id'] = '';
// $_SESSION['user_name'] = '';

// Generates page
$pageHandler = new pageHandler;
$pageHandler->getPage();

// var_dump($_SESSION);

