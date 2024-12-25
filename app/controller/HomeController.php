<?php
require_once '../model/HomeModel.php';

HomeModel::checkSession();

$user = HomeModel::getUserInfo();

if (!$user) {
    die("Lỗi: Không thể lấy thông tin người dùng. Vui lòng đăng nhập lại.");
}

require '../view/HomeView.php';
?>