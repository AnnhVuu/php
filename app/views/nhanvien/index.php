<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <?php if (isset($_SESSION['user'])): ?>
            <div class="alert alert-info">
                Xin chào, <?= htmlspecialchars($_SESSION['user']['username']) ?>
            </div>
        <?php endif; ?>
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
            <h2 class="text-center flex-grow-1">THÔNG TIN NHÂN VIÊN</h2>
            <?php if (isset($_SESSION['user'])): ?>
                <a href="/8241_LeLamAnhVu/auth/logout" class="btn btn-danger mt-2 mt-md-0">Đăng xuất</a>
            <?php endif; ?>
        </div>
        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
            <a href="/8241_LeLamAnhVu/nhanvien/add" class="btn btn-success mb-3">Thêm Nhân Viên</a>
        <?php endif; ?>
        <?php
        // Ensure required variables are set to avoid warnings/errors
        $nhanviens = $nhanviens ?? [];
        $total = isset($total) ? $total : 0;
        $perPage = (isset($perPage) && $perPage > 0) ? $perPage : 5;
        ?>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã NV</th>
                        <th>Tên NV</th>
                        <th>Giới Tính</th>
                        <th>Nơi Sinh</th>
                        <th>Tên Phòng</th>
                        <th>Lương</th>
                        <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                            <th>Action</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nhanviens as $nv): ?>
                        <tr>
                            <td><?= $nv['Ma_NV'] ?></td>
                            <td><?= $nv['Ten_NV'] ?></td>
                            <td class="text-center">
                                <?php if ($nv['Phai'] === 'NU'): ?>
                                    <img src="assets/img/woman.png" width="30" alt="Woman">
                                <?php else: ?>
                                    <img src="assets/img/man.png" width="30" alt="Man">
                                <?php endif; ?>
                            </td>
                            <td><?= $nv['Noi_Sinh'] ?></td>
                            <td><?= $nv['Ten_Phong'] ?></td>
                            <td><?= number_format($nv['Luong']) ?></td>
                            <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin'): ?>
                                <td>
                                    <a href="/8241_LeLamAnhVu/nhanvien/edit/<?= $nv['Ma_NV'] ?>" class="btn btn-primary btn-sm">Sửa</a>
                                    <a href="/8241_LeLamAnhVu/nhanvien/delete/<?= $nv['Ma_NV'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= ceil($total / $perPage); $i++): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>