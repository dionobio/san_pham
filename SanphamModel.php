<?php
class SanphamModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = connectDB(); // Giả sử hàm connectDB() đã được định nghĩa bên ngoài
    }

    // Lấy tất cả sản phẩm
    public function getAll()
    {
        try {
            $stmt = $this->pdo->query("SELECT * FROM san_phams");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi kết nối CSDL: " . $e->getMessage();
            return false;
        }
    }

    // Lấy sản phẩm theo ID
    public function getById($id)
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM san_phams WHERE id = :id");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Lỗi khi lấy dữ liệu sản phẩm: " . $e->getMessage();
            return false;
        }
    }

    // Thêm sản phẩm mới
    public function add($danh_muc_id, $ten_san_pham, $mo_ta, $gia_ban, $gia_nhap, $gia_khuyen_mai, $so_luong, $hinh_anh, $trang_thai, $ngay_nhap, $luot_xem, $mo_ta_chi_tiet)
    {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO san_phams (danh_muc_id, ten_san_pham, mo_ta, gia_ban, gia_nhap, gia_khuyen_mai, so_luong, hinh_anh, trang_thai, ngay_nhap, luot_xem, mo_ta_chi_tiet) 
                                         VALUES (:danh_muc_id, :ten_san_pham, :mo_ta, :gia_ban, :gia_nhap, :gia_khuyen_mai, :so_luong, :hinh_anh, :trang_thai, :ngay_nhap, :luot_xem, :mo_ta_chi_tiet)");
            return $stmt->execute([
                'danh_muc_id' => $danh_muc_id,
                'ten_san_pham' => $ten_san_pham,
                'mo_ta' => $mo_ta,
                'gia_ban' => $gia_ban,
                'gia_nhap' => $gia_nhap,
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'so_luong' => $so_luong,
                'hinh_anh' => $hinh_anh,
                'trang_thai' => $trang_thai,
                'ngay_nhap' => $ngay_nhap,
                'luot_xem' => $luot_xem,
                'mo_ta_chi_tiet' => $mo_ta_chi_tiet
            ]);
        } catch (PDOException $e) {
            echo "Lỗi khi thêm sản phẩm: " . $e->getMessage();
            return false;
        }
    }

    // Cập nhật sản phẩm theo ID
    public function update($id, $danh_muc_id, $ten_san_pham, $mo_ta, $gia_ban, $gia_nhap, $gia_khuyen_mai, $so_luong, $hinh_anh, $trang_thai, $ngay_nhap, $luot_xem, $mo_ta_chi_tiet)
    {
        try {
            $stmt = $this->pdo->prepare("UPDATE san_phams 
                                         SET danh_muc_id = :danh_muc_id, ten_san_pham = :ten_san_pham, mo_ta = :mo_ta, gia_ban = :gia_ban, gia_nhap = :gia_nhap, 
                                             gia_khuyen_mai = :gia_khuyen_mai, so_luong = :so_luong, hinh_anh = :hinh_anh, trang_thai = :trang_thai, 
                                             ngay_nhap = :ngay_nhap, luot_xem = :luot_xem, mo_ta_chi_tiet = :mo_ta_chi_tiet 
                                         WHERE id = :id");
            return $stmt->execute([
                'id' => $id,
                'danh_muc_id' => $danh_muc_id,
                'ten_san_pham' => $ten_san_pham,
                'mo_ta' => $mo_ta,
                'gia_ban' => $gia_ban,
                'gia_nhap' => $gia_nhap,
                'gia_khuyen_mai' => $gia_khuyen_mai,
                'so_luong' => $so_luong,
                'hinh_anh' => $hinh_anh,
                'trang_thai' => $trang_thai,
                'ngay_nhap' => $ngay_nhap,
                'luot_xem' => $luot_xem,
                'mo_ta_chi_tiet' => $mo_ta_chi_tiet
            ]);
        } catch (PDOException $e) {
            echo "Lỗi khi cập nhật sản phẩm: " . $e->getMessage();
            return false;
        }
    }

    // Xóa sản phẩm theo ID
    public function delete($id)
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM san_phams WHERE id = :id");
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            echo "Lỗi khi xóa sản phẩm: " . $e->getMessage();
            return false;
        }
    }
}
?>
