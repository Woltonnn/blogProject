<?php
    // includes
    require_once('account.php');
    
    class pageHandler {
        private $accountHandler;

        public function __construct() {
            $this->accountHandler = new accountHandler();
        }

        public function getPage() {
            // check if user is logged in
            if ($this->accountHandler->isLoggedIn()) {
                // Check if [page] is specified
                if (!empty($_GET['page'])) {
                    $page = $_GET['page'];
                } else{
                    $page = 'home';
                }
                // get page specific header and body
                $this->giveHead();
                $this->requestPage($page);
                $this->giveFoot();

            } else {
                // check which login page needs to be shown
                if (!empty($_GET['page'])) {
                    if ($_GET['page'] == 'register') {
                        $page = 'register';
                    } else {
                        $page = 'login';
                    }
                } else{
                    $page = 'login';
                }
                $this->giveHead('login');
                $this->requestPage($page);
                $this->giveFoot('login');
            }  
        }

        private function giveHead($requestedHeader = 'head') {
            // include head
            switch ($requestedHeader) {
                case 'main':
                    include_once('../template/headers/header.php');
                    break;
                case 'login':
                    include_once('../template/headers/loginHeader.php');
                    break;
            }
        }

        private function giveFoot( $requestFooterParameter = "main") {
            switch ($requestFooterParameter) {
                case 'main':
                    include_once('../template/footers/mainFooter.php');
                    break;
                case 'login':
                    include_once('../template/footers/loginFooter.php');
                    break;
            }
        }

        private function requestPage($requestedPage) {
            $tmpath = '../template/';
            switch ($requestedPage) {
                case 'home':
                    include_once $tmpath . 'home.php';
                    break;
                case 'about':
                    include_once $tmpath . 'about.php';
                    break;
                case 'contact':
                    include_once $tmpath . 'contact.php';
                    break;
                case 'login':
                    include_once $tmpath . 'login.php';
                    break;
                case 'register':
                    include_once $tmpath . 'register.php';
                    break;
                default:
                    // Handle cases where the requested page doesn't match any known pages
                    echo "404 Page not found.";
            }
        }

        public function fetchTitle(){
            if (!empty($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                if ($this->accountHandler->isLoggedIn()) {
                    $page = 'home';
                } else {
                    $page = 'login';
                }
            }
            print($page);
        }
    }







