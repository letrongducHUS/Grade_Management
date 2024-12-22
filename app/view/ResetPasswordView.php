<?php
require_once "../model/ResetPasswordModel.php";

$model = new ResetPasswordModel("localhost", "root", "", "quanlydiem");

$admins = $model->getAdminsWithResetTokens();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../../web/ResetPassword.css">
</head>
<body>
<form action="../controller/ResetPasswordController.php" method="POST">
    <table>
        <tr>
            <th>NO</th>
            <th>Tên người dùng</th>
            <th>Mật khẩu mới</th>
            <th>Action</th>
        </tr>
        <?php if (isset($admins) && $admins->num_rows > 0): ?>
            <?php $i = 1; ?>
            <?php while ($row = $admins->fetch_assoc()): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= htmlspecialchars($row['login_id']) ?></td>
                    <td><input type="password" name="new_password[<?= htmlspecialchars($row['login_id']) ?>]"></td>
                    <td>
                        <button type="submit" name="reset[<?= htmlspecialchars($row['login_id']) ?>]" value="<?= htmlspecialchars($row['login_id']) ?>">
                            Reset
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">Không có người dùng nào yêu cầu reset mật khẩu</td></tr>
        <?php endif; ?>
    </table>
</form>
</body>
</html>