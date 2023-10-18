<?php

    class LoginHandler {
        public function isUserLoggedIn():void{
            if(!isset($_SESSION['is_loggedin_check']) || $_SESSION['is_loggedin_check'] == ""){
                include("../pages/registrationForm.php");
            } elseif ($_SESSION['is_loggedin_check']) {
                include("../pages/home.php");
            }
        }
    }







?>