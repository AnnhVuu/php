<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">Thêm Nhân Viên</h2>
        <form method="POST" action="" class="row g-3">
            <div class="col-md-6">
                <label for="Ma_NV" class="form-label">Mã Nhân Viên</label>
                <input type="text" class="form-control" id="Ma_NV" name="Ma_NV" required>
            </div>
            <div class="col-md-6">
                <label for="Ten_NV" class="form-label">Tên Nhân Viên</label>
                <input type="text" class="form-control" id="Ten_NV" name="Ten_NV" required>
            </div>
            <div class="col-md-6">
                <label for="Phai" class="form-label">Giới Tính</label>
                <select class="form-control" id="Phai" name="Phai">
                    <option value="NAM">Nam</option>
                    <option value="NU">Nữ</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="Noi_Sinh" class="form-label">Nơi Sinh</label>
                <input type="text" class="form-control" id="Noi_Sinh" name="Noi_Sinh" required>
            </div>
            <div class="col-md-6">
                <label for="Ma_Phong" class="form-label">Phòng Ban</label>
                <select class="form-control" id="Ma_Phong" name="Ma_Phong" required>
                    <option value="">-- Chọn Phòng Ban --</option>
                    <?php foreach ($phongBans as $phongBan): ?>
                        <option value="<?= $phongBan['Ma_Phong'] ?>"><?= $phongBan['Ten_Phong'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="Luong" class="form-label">Lương</label>
                <input type="number" class="form-control" id="Luong" name="Luong" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Thêm</button>
                <a href="/8241_LeLamAnhVu/nhanvien" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>
</body>

</html>