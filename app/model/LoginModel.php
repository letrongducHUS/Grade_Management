<?php
class LoginModel
{
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function login($login_id, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM admins WHERE login_id = ? AND password = ?");
        $stmt->bind_param("ss", $login_id, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function close()
    {
        $this->conn->close();
    }
}
?>