<?php
require_once '../model/HomeModel.php';

$user = HomeModel::getUserInfo();

if (!$user) {
    header('Location: LoginView.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../../web/Home.css">
</head>
<body>
<div class="header">
    <p>Tên login: <?= htmlspecialchars($user['user']) ?></p>
    <p>Thời gian login: <?= htmlspecialchars($user['login_time']) ?></p>
</div>

<table>
    <thead>
    <tr>
        <th>Phòng học</th>
        <th>Giáo viên</th>
        <th>Môn học</th>
        <th>Sinh viên</th>
        <th>Điểm</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td> <a href="#">Tìm kiếm</a>  <br>
            <a href="#">Thêm mới</a>
        </td>
        <td> <a href="#">Tìm kiếm</a> <br>
            <a href="#">Thêm mới</a>
        </td>
        <td> <a href="#">Tìm kiếm</a> <br>
            <a href="#">Thêm mới</a>
        </td>
        <td> <a href="#">Tìm kiếm</a> <br>
            <a href="#">Thêm mới</a>
        </td>
        <td> <a href="#">Tìm kiếm</a> <br>
            <a href="#">Thêm điểm</a>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>