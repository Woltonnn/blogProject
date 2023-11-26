<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../../functions/account.php");
    require_once("../../config.php");
    $connection = mysqli_connect(DOM, USER, PASS, DB);
    $accountHandler = new accountHandler;
    
    
    $user = $_POST["user"];
    $password = $_POST["password"];

    $errors = [];
    
    if ($email != $accountHandler->sanitizeInput($user) || 
        $password != $accountHandler->sanitizeInput($password)) {
        $errors['sanitized_input'] = "Don't put spaces or unknown characters in the fields";
    }
    switch ($accountHandler->username_or_email($user)) {
        case 'email':
            if ($accountHandler->loginEmail($user, $password, $connection)) {
                header("Location: /");
                die();
            } else {
                $errors['mismatch'] = "The username/password didn't match";
            }
            break;
        case 'username':
            if ($accountHandler->loginUsername($user, $password, $connection)) {
                header("Location: /");
                die();
            } else {
                $errors['mismatch'] = "The username/password didn't match";
            }
            break;
        case 'none':
            $errors['valid_user'] = "Please enter a valid email or username";
            break;
    }
    
    header("Location: /?page=login");
    die();









    
} else {
    // Goodbye :D
    header("Location: /");
    die();
}