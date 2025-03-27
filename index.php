<?php
require_once 'core/bootstrap.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Adjust redirection logic to handle logout properly
if (empty($url[0]) || strtolower($url[0]) !== 'login') {
    if (!isset($_SESSION['user'])) {
        header('Location: /8241_LeLamAnhVu/login');
        exit;
    }
    if ($_SESSION['user']['role'] !== 'admin' && strtolower($url[0]) !== 'nhanvien') {
        header('Location: /8241_LeLamAnhVu/nhanvien');
        exit;
    }
}

if (!empty($url[0])) {
    if (strtolower($url[0]) === 'login') {
        $controllerName = 'AuthController';
        $action = 'login'; // set default action for AuthController
    } elseif (strtolower($url[0]) === 'auth' && strtolower($url[1] ?? '') === 'logout') {
        $controllerName = 'AuthController';
        $action = 'logout'; // handle logout action
    } else {
        $controllerName = ucfirst(strtolower($url[0])) . 'Controller';
        $action = isset($url[1]) && $url[1] != '' ? strtolower($url[1]) : 'index';
    }
} else {
    $controllerName = 'NhanVienController';
    $action = 'index';
}

$controllerPath = __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR .
    'controllers' . DIRECTORY_SEPARATOR . $controllerName . '.php';

if (!file_exists($controllerPath)) {
    die('Controller not found: ' . $controllerPath);
}

require_once $controllerPath;
$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    die('Action not found');
}

call_user_func_array([$controller, $action], array_slice($url, 2));
