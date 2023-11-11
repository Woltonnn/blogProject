<?php
// !isset($_SESSION['is_loggedin_check'])
    class loginHandler {
        public function isUserLoggedIn() {
            if(!isset($_SESSION['is_loggedin_check']) || $_SESSION['is_loggedin_check'] == ""){
                return false;
            } elseif ($_SESSION['is_loggedin_check']) {
                return true;
            }
        }


        public function registerAccount() {
            print('account created');
        }


        public function loginAccount() {

        }
    }

// print("test");





