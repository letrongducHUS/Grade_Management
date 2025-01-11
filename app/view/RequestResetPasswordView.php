<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Reset Password</title>
    <link rel="stylesheet" href="../../web/ResetPassword.css">
</head>
<body>
<div class="request-reset-password">
    <?php if (!isset($_SESSION['reset_token'])) { ?>
        <form action="../controller/RequestResetPasswordController.php" method="POST">
            <label for="username" >Người dùng:</label>
            <br>
            <br>
            <input type="text" id="username" name="username"/>
            <br>
            <input type="submit" id="submit-request" value="Gửi yêu cầu reset password" />
        </form>
    <?php }  ?>
</div>
</body>
</html>