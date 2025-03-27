<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa Nhân Viên</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2 class="text-center">Sửa Nhân Viên</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="Ma_NV">Mã Nhân Viên</label>
                <input type="text" class="form-control" id="Ma_NV" name="Ma_NV" value="<?= $nhanvien['Ma_NV'] ?>" readonly>
            </div>
            <div class="form-group">
                <label for="Ten_NV">Tên Nhân Viên</label>
                <input type="text" class="form-control" id="Ten_NV" name="Ten_NV" value="<?= $nhanvien['Ten_NV'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Phai">Giới Tính</label>
                <select class="form-control" id="Phai" name="Phai">
                    <option value="NAM" <?= $nhanvien['Phai'] === 'NAM' ? 'selected' : '' ?>>Nam</option>
                    <option value="NU" <?= $nhanvien['Phai'] === 'NU' ? 'selected' : '' ?>>Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Noi_Sinh">Nơi Sinh</label>
                <input type="text" class="form-control" id="Noi_Sinh" name="Noi_Sinh" value="<?= $nhanvien['Noi_Sinh'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Ma_Phong">Mã Phòng</label>
                <input type="text" class="form-control" id="Ma_Phong" name="Ma_Phong" value="<?= $nhanvien['Ma_Phong'] ?>" required>
            </div>
            <div class="form-group">
                <label for="Luong">Lương</label>
                <input type="number" class="form-control" id="Luong" name="Luong" value="<?= $nhanvien['Luong'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="/8241_LeLamAnhVu/nhanvien" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>

</html>