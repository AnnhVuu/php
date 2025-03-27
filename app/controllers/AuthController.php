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
        if (session_status() !== PHP_SESSION_ACTIVE) session_start(); // Ensure session is started
        session_unset(); // Clear all session variables
        session_destroy(); // Destroy the session

        // Clear the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        header('Location: /8241_LeLamAnhVu/login'); // Redirect to login page
        exit;
    }
}
