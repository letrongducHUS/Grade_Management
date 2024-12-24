<?php
session_start();
require_once '../model/LoginModel.php';

$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "quanlydiem";

$model = new LoginModel($servername, $db_username, $db_password, $dbname);

$error = '';
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($username)) {
        $error = "Hãy nhập login id";
    } elseif (strlen($username) < 4) {
        $error = "Hãy nhập login id tối thiểu 4 ký tự";
    } elseif (empty($password)) {
        $error = "Hãy nhập password";
    } elseif (strlen($password) < 6) {
        $error = "Hãy nhập password tối thiểu 6 ký tự";
    } else {
        if ($model->login($username, $password)) {
            $_SESSION['user'] = $username;
            $_SESSION['login_time'] = date('Y-m-d H:i');
            header('home.php');
            exit();
        } else {
            $error = "Login id và password không đúng";
        }
    }
}
$model->close();

require '../view/LoginView.php';
?>