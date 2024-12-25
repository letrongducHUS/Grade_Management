<?php
session_start();

class HomeModel {
    public static function checkSession() {
        if (!isset($_SESSION['user']) || !isset($_SESSION['login_time'])) {
            header('Location: LoginController.php');
            exit();
        }
    }

    public static function getUserInfo() {
        if (isset($_SESSION['user']) && isset($_SESSION['login_time'])) {
            return [
                'user' => $_SESSION['user'],
                'login_time' => $_SESSION['login_time']
            ];
        }
        return null;
    }
}
?>
