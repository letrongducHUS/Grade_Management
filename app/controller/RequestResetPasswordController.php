<?php
session_start();

require_once '../model/RequestResetPasswordModel.php';

class RequestResetPasswordController {
    private $model;

    public function __construct($conn) {
        $this->model = new RequestResetPasswordModel($conn);
    }

    public function handleRequest() {
        $message = "";
        $username = "";

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username'])) {
            $username = trim($_POST['username']);

            if (empty($username)) {
                $message = "Hãy nhập login id";
                $this->renderForm($message, $username);
                return;
            }

            if (strlen($username) < 4) {
                $message = "Hãy nhập login id tối thiểu 4 ký tự";
                $this->renderForm($message, $username);
                return;
            }

            $result = $this->model->getAdminByUsername($username);

            if ($result->num_rows > 0) {
                $admin = $result->fetch_assoc();

                if (!empty($admin['reset_password_token'])) {
                    $message = "Yêu cầu reset mật khẩu đã được gửi trước đó";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                    echo "<script type='text/javascript'>window.location.href = '../view/LoginView.php';</script>";
                } else {
                    $resetToken = microtime(true);
                    if ($this->model->updateResetToken($username, $resetToken)) {
                        $_SESSION['reset_token'] = $resetToken;
                        $_SESSION['username'] = $username;
                        $message = "Yêu cầu reset mật khẩu thành công";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        echo "<script type='text/javascript'>window.location.href = '../view/LoginView.php';</script>";
                        exit;
                    } else {
                        $message = "Lỗi: " . $this->conn->error;
                    }
                }
            } else {
                $message = "Login id không tồn tại trong hệ thống";
            }
        }

        $this->renderForm($message, $username);
    }

    private function renderForm($message, $username) {
        echo "<link rel='stylesheet' type='text/css' href='../../web/ResetPassword.css'>";
        echo "<div><form method='POST' action=''>
            <label for='username'>Tên người dùng:</label> 
            <br> 
            <br>
            <input type='text' id='username' name='username'>
            <br>
            <input type='submit' value='Gửi yêu cầu reset password' />
        </form>
        </div>";

        if ($message) {
            echo "<script>alert('$message')</script>";
        }
    }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quanlydiem";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$controller = new RequestResetPasswordController($conn);
$controller->handleRequest();
?>