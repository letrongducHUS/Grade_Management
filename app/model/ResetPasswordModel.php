<?php
class ResetPasswordModel {
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAdminsWithResetTokens() {
        $sql = "SELECT * FROM admins WHERE reset_password_token != ''";
        return $this->conn->query($sql);
    }

    public function getResetPasswordToken($username) {
        $sql = "SELECT reset_password_token FROM admins WHERE login_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updatePassword($username, $hashedPassword) {
        $sql = "UPDATE admins SET reset_password_token = '', password = ? WHERE login_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $hashedPassword, $username);
        return $stmt->execute();
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>