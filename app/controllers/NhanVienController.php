<?php
class NhanVienController
{
    private $model;

    public function __construct()
    {
        $this->model = new NhanVien();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 5;
        $total = $this->model->getTotal();
        $nhanviens = $this->model->getAll($page, $perPage);
        require 'app/views/nhanvien/index.php';
    }

    public function add()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            die('Access denied. Only admins can perform this action.');
        }

        $phongBanModel = new PhongBan();
        $phongBans = $phongBanModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'Ma_NV' => $_POST['Ma_NV'],
                'Ten_NV' => $_POST['Ten_NV'],
                'Phai' => $_POST['Phai'],
                'Noi_Sinh' => $_POST['Noi_Sinh'],
                'Ma_Phong' => $_POST['Ma_Phong'],
                'Luong' => $_POST['Luong']
            ];
            $this->model->create($data);
            header('Location: /8241_LeLamAnhVu/nhanvien');
            exit;
        }
        require 'app/views/nhanvien/add.php';
    }

    public function edit($id)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            die('Access denied. Only admins can perform this action.');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'Ma_NV' => $id,
                'Ten_NV' => $_POST['Ten_NV'],
                'Phai' => $_POST['Phai'],
                'Noi_Sinh' => $_POST['Noi_Sinh'],
                'Ma_Phong' => $_POST['Ma_Phong'],
                'Luong' => $_POST['Luong']
            ];
            $this->model->update($data);
            header('Location: /8241_LeLamAnhVu/nhanvien');
            exit;
        }
        $nhanvien = $this->model->getById($id);
        require 'app/views/nhanvien/edit.php';
    }

    public function delete($id)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            die('Access denied. Only admins can perform this action.');
        }

        $this->model->delete($id);
        header('Location: /8241_LeLamAnhVu/nhanvien');
        exit;
    }
}
