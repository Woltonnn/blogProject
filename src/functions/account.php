<?php
// !isset($_SESSION['is_loggedin_check'])
declare(strict_types=1);
    class accountHandler {
        public function isLoggedIn() {
            if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == ""){
                return false;
            } else {
                return true;
            }
        }


        public function showErrors() {
            if(isset($_SESSION['registration_errors'])) {
                $errors =  $_SESSION['registration_errors'];

                foreach ($errors as $error) {
                    echo("<p class='registrationError'>" . $error . "<p>");
                }

                unset($_SESSION['registration_errors']);
            }
        }
        public function sanitizeInput($input) {
            $input = trim($input);
            $input = strip_tags($input);
            $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            return $input;
        }
        // register functions
        public function isEmpty($userInput) {
            return empty($userInput);
        }
        public function validateEmail($email) {
            $email2 = filter_var($email, FILTER_SANITIZE_EMAIL);
            // Validate email
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && $email == $email2) {
                return true;
            } else {
                return false;
            }
        }
        public function validatePassword($password) {
            $allowedCharacters = '/^[a-zA-Z0-9!@#$%^&*()_+]+$/';

            if (strlen($password) >= 6 && 
                strlen($password) <= 32 && 
                preg_match($allowedCharacters, $password) && 
                preg_match('/[a-z]/', $password) &&
                preg_match('/[A-Z]/', $password) &&
                preg_match('/[0-9]/', $password)) {
                return true;
            } else {
                return false;
            }
        }
        public function validateUsername($username) {
            if (preg_match('/^[a-zA-Z0-9!@#$%^&*()_+]+$/', $username) && strlen($username) <= 50) {
                return false;
            } else {
                return true;
            }
        }
        public function encryptPassword($password) {
            $option = ['cost' => 12];
            return password_hash($password, PASSWORD_BCRYPT, $option);
        }
        public function alreadyExists ($conn, $userInput, $type) {
            switch ($type) {
                case 'username':
                    $sql = "SELECT username FROM account WHERE username = ?;";
                    $query = $conn->prepare($sql);
                    $query->bind_param("s", $userInput);
                    $query->execute();
                    return $query->fetch();
                case 'email':
                    $sql = "SELECT email FROM account WHERE email = ?;";
                    $query = $conn->prepare($sql);
                    $query->bind_param("s", $userInput);
                    $query->execute();
                    return $query->fetch();
            }
        }

        // login functions
        public function username_or_email($userInput) {
            if(filter_var($userInput, FILTER_VALIDATE_EMAIL)){
                return 'email';
            } else if (preg_match('/^[a-zA-Z0-9!@#$%^&*()_+]+$/', $userInput)) {
                return 'username';
            } else {
                return 'none';
            }
        }
        public function loginUsername($username, $password, $conn) {
            $username = $conn->real_escape_string($username);

            $query = "SELECT id, username, password FROM account WHERE username = '$username';";
            $result = $conn->query($query);


            if ($result) {
                if ($result->num_rows > 0) {
                    
                    $row = $result->fetch_assoc();
                    $hashedPasswordFromDB = $row['password']; 
                
                    if (password_verify($password, $hashedPasswordFromDB)) {
                        require_once('ini.php');
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['username'];
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                die("Query failed: " . $conn->error);
            }
        }
        public function loginEmail($email, $password, $conn) {
            $email = $conn->real_escape_string($email);

            $query = "SELECT id, username, password FROM account WHERE email = '$email';";
            $result = $conn->query($query);


            if ($result) {
                if ($result->num_rows > 0) {
                    
                    $row = $result->fetch_assoc();
                    $hashedPasswordFromDB = $row['password']; 
                
                    if (password_verify($password, $hashedPasswordFromDB)) {
                        require_once('ini.php');
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_name'] = $row['username'];
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } else {
                die("Query failed: " . $conn->error);
            }
        }
    }
