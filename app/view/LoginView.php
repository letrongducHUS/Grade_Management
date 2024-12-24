<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../web/Login.css">
</head>
<body>
<div class="container">
    <form method="post" action="../controller/LoginController.php">
        <label for="username">Người dùng</label>
        <input type="text" id="username" name="username" value="<?= htmlspecialchars($username ?? '') ?>">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <a href="../controller/RequestResetPasswordController.php">Quên password</a>
        <button type="submit">Đăng nhập</button>
    </form>
</div>
</body>
</html>
