<?php
class PhongBan extends Model
{
    // Phương thức lấy danh sách phòng ban (nếu cần)
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM PHONGBAN");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
