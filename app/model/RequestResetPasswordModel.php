<?php
class RequestResetPasswordModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getAdminByUsername($username) {
        $username = mysqli_real_escape_string($this->conn, $username);
        $sql = "SELECT * FROM admins WHERE login_id = '$username'";
        $result = $this->conn->query($sql);
        return $result;
    }

    public function updateResetToken($username, $resetToken) {
        $updateSQL = "UPDATE admins SET reset_password_token = '$resetToken' WHERE login_id = '$username'";
        return $this->conn->query($updateSQL);
    }
}
?>