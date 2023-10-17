<?php
// start session
    session_start();
    require_once('../functions/includes.php');
    require_once('../functions/config.php');
    require_once('../functions/account.php');
    $LoginHandler = new LoginHandler;

?>

<?php
    include_once('../modules/header.php');






    $LoginHandler->isUserLoggedIn();






    include_once('../modules/footer.php');
?>


