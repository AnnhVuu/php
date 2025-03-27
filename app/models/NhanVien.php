<?php
class NhanVien extends Model
{
    public function getAll($page = 1, $perPage = 5)
    {
        $offset = ($page - 1) * $perPage;
        $stmt = $this->db->prepare("
            SELECT nv.*, pb.Ten_Phong 
            FROM NHANVIEN nv 
            JOIN PHONGBAN pb ON nv.Ma_Phong = pb.Ma_Phong 
            LIMIT :limit OFFSET :offset
        ");
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotal()
    {
        $stmt = $this->db->query("SELECT COUNT(*) FROM NHANVIEN");
        return $stmt->fetchColumn();
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO NHANVIEN (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong)
            VALUES (:Ma_NV, :Ten_NV, :Phai, :Noi_Sinh, :Ma_Phong, :Luong)
        ");
        $stmt->execute($data);
    }

    public function update($data)
    {
        $stmt = $this->db->prepare("
            UPDATE NHANVIEN
            SET Ten_NV = :Ten_NV, Phai = :Phai, Noi_Sinh = :Noi_Sinh, Ma_Phong = :Ma_Phong, Luong = :Luong
            WHERE Ma_NV = :Ma_NV
        ");
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM NHANVIEN WHERE Ma_NV = ?");
        $stmt->execute([$id]);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM NHANVIEN WHERE Ma_NV = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
