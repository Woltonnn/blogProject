<?php
session_start();
require_once('../includes.php');
require_once('../config.php');
require_once('../src/account.php');
$LoginHandler = new LoginHandler;

?>

<?php
    include_once('../modules/header.php');






$LoginHandler->isUserLoggedIn();






    include_once('../modules/footer.php');
?>


