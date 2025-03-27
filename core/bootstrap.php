<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Nạp cấu hình cơ sở dữ liệu
require_once __DIR__ . '/../app/config/database.php';

// Nạp các lớp lõi
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/core/Model.php';

// Autoload Models & Controllers
spl_autoload_register(function ($class) {
    if (file_exists(__DIR__ . "/../app/models/{$class}.php")) {
        require_once __DIR__ . "/../app/models/{$class}.php";
    } elseif (file_exists(__DIR__ . "/../app/controllers/{$class}.php")) {
        require_once __DIR__ . "/../app/controllers/{$class}.php";
    }
});
