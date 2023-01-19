<?php 
    class Auth {
        public static function check() {
            session_start();
            if (!isset($_SESSION['auth']) || $_SESSION['auth'] == false) {
                header('Location: index.php?unauthorized');
                exit;
            }
        }

        public static function isLogin() {
            session_start();
            if(isset($_SESSION['auth']) && $_SESSION['auth']) {
                header('Location: app.php');
                exit;
            }
        }
    }