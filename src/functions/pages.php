<?php
    // includes
    require_once('account.php');



    class pageHandler {
        public function getPage() {
            $LoginHandler = new loginHandler;

            // check if user is logged in
            if ($LoginHandler->isUserLoggedIn()) {
                // Check if [page] is specified
                if (!empty($_GET['page'])) {
                    $page = $_GET['page'];
                } else{
                    $page = 'home';
                }
                // get page specific header and body
                $this->giveHead('main');
                $this->requestPage($page);

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
            }  

            $this->giveFoot();
        }



        private function giveHead($requestedHeader) {
            // include head
            switch ($requestedHeader) {
                case 'main':
                    include_once('../modules/pageHeaders/header.php');
                    break;
                case 'login':
                    include_once('../modules/pageHeaders/loginHeader.php');
                    break;
            }
        }

        private function giveFoot() {
            // include page end
            include_once('../modules/footer.php');
        }

        private function requestPage($requestedPage) {
            $tmpath = '../pages/';
            switch ($requestedPage) {
                case 'home':
                    include $tmpath . 'home.php';
                    break;
                case 'about':
                    include $tmpath . 'about.php';
                    break;
                case 'contact':
                    include $tmpath . 'contact.php';
                    break;
                case 'login':
                    include $tmpath . 'login.php';
                    break;
                case 'register':
                    include $tmpath . 'register.php';
                    break;
                default:
                    // Handle cases where the requested page doesn't match any known pages
                    echo "404 Page not found.";
        }
    }
}







