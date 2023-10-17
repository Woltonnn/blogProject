<?php

    class LoginHandler {
        public function isUserLoggedIn():void{
            if(!isset($_SESSION['is_loggedin_check'])){
                include("../pages/loginForm.php");
            } elseif ($_SESSION['is_loggedin_check']) {
                include("../pages/home.php");
            }
        }
    }







?>