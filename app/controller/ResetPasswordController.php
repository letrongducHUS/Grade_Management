<?php
require_once "../model/ResetPasswordModel.php";

$model = new ResetPasswordModel("localhost", "root", "", "quanlydiem");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST['reset'] as $username) {
        if (isset($_POST['new_password'][$username])) {
            $newPassword = $_POST['new_password'][$username];

            if (empty($newPassword)) {
                echo "<script>alert('Hãy nhập mật khẩu mới');</script>";
            } elseif (strlen($newPassword) < 6) {
                echo "<script>alert('Hãy nhập mật khẩu có tối thiểu 6 ký tự');</script>";
            } else {
                $row = $model->getResetPasswordToken($username);

                if (!empty($row['reset_password_token'])) {
                    $hashedPassword = md5($newPassword);
                    if ($model->updatePassword($username, $hashedPassword)) {
                        echo "<script>alert('Mật khẩu đã được cập nhật thành công');</script>";

                    } else {
                        echo "<script>alert('Lỗi khi cập nhật mật khẩu');</script>";
                    }
                } else {
                    echo "<script>alert('Mật khẩu đã được reset trước đó');</script>";
                }
            }
        }
    }
}

$admins = $model->getAdminsWithResetTokens();
$model->closeConnection();

include "../view/ResetPasswordView.php";
?>