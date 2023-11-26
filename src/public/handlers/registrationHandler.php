<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    require_once("../../functions/account.php");
    require_once("../../config.php");
    $connection = mysqli_connect(DOM, USER, PASS, DB);
    $accountHandler = new accountHandler;
    
    
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordCheck = $_POST["passwordCheck"];
    
    
    $errors = [];
    
    if ($email != $accountHandler->sanitizeInput($email) || 
        $username != $accountHandler->sanitizeInput($username) || 
        $password != $accountHandler->sanitizeInput($password) ||
        $passwordCheck != $accountHandler->sanitizeInput($passwordCheck)) {
        $errors['sanitized_input'] = "Don't put spaces or unknown characters in the fields";
    }
    if ($accountHandler->isEmpty($email) || $accountHandler->isEmpty($username) || $accountHandler->isEmpty($password)) {
        $errors['empty_input'] = "Fill in all the fields!";
    }
    if (!$accountHandler->validateEmail($email)) {
        $errors['invalid_email'] = "Please fill in a correct email adress";
    }
    if ($accountHandler->validateUsername($username)) {
        $errors['invalid_name'] = "Enter a valid username using only letters, numbers and special characters";
    }
    if (!$accountHandler->validatePassword($password) || $password != $passwordCheck) {
        $errors['invalid_password'] = "Fill in a good password using atleast one: smaller case, uppper case and a number";
    }
    if ($accountHandler->alreadyExists($connection, $username, 'username')) {
        $errors['name_exists'] = "There already is an account with this username";
    }
    if ($accountHandler->alreadyExists($connection, $email, 'email')) {
        $errors['email_exists'] = "There already is an account with this email";
    }
    $encryptedPassword = $accountHandler->encryptPassword($password);
    

    require_once("../../functions/ini.php");
    
    if ($errors) {
        unset($_SESSION['registration_errors']);
        $_SESSION['registration_errors'] = $errors;
        header("Location: /?page=register");
        die();

    } else {
        $dateTime = date("Y-m-d H:i:s");
        $sql = "INSERT INTO account (username, email, password, datetime) VALUES ('$username', '$email', '$encryptedPassword', '$dateTime');";


        try {
            // execute Query and catch error if there is any
            if ($connection->query($sql) === TRUE) {
                $_SESSION['user_name'] = $username; // add username to session

                // Prepare statement and execute query to retrieve user_id and put it in the session
                $sql = "SELECT id FROM account WHERE username = '$username';"; //prepare query
                $fetched = $connection->query($sql); // put the userinput in
                $UID = $fetched->fetch_assoc(); //filter output to get the actual ID
                $_SESSION['user_id'] = $UID; //put it in

                header("Location: /");
                die();
            } else { 
                throw new Exception("Error: " . $sql . "<br>" . $connection->error);
            }
        } catch (Exception $e) {

            echo "Error: " . $e->getMessage();
        }
    }
} else { 
    // Goodbye! :D
    header("Location: /");
    die();
}