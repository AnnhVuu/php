<?php
class AuthController
{
    public function login()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start(); // Ensure session is started
        $error = '';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new Users();
            $user = $userModel->checkLogin($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['user'] = [
                    'id' => $user['Id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];
                header('Location: /8241_LeLamAnhVu/nhanvien');
                exit;
            } else {
                $error = "Tài khoản hoặc mật khẩu không đúng!";
            }
        }
        require __DIR__ . '/../views/auth/login.php';
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
        header('Location: /8241_LeLamAnhVu/login');
        exit;
    }
}
