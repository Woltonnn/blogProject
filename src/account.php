<?php

    class LoginHandler {
        public function isUserLoggedIn():void{
            if(!isset($_SESSION['is_loggedin_check'])){
                include("../modules/loginForm.php");
            } elseif ($_SESSION['is_loggedin_check']) {
                include("../modules/home.php");
            }
        }
    }







?>