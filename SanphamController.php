<?php
require_once "./models/SanphamModel.php";

class SanphamController
{
    private $model;

    public function __construct()
    {
        $this->model = new SanphamModel();
    }

    // Hiển thị danh sách sản phẩm
    public function showSanphamList()
    {
        $Sanphams = $this->model->getAll();
        require "views/sanpham/sanpham_list.php";
    }

    // Hiển thị form thêm sản phẩm
    public function showAddSanphamForm()
    {
        require "views/sanpham_add.php";
    }

    // Xử lý thêm sản phẩm mới
    public function addSanpham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'danh_muc_id' => $_POST['danh_muc_id'],
                'ten_san_pham' => $_POST['ten_san_pham'],
                'mo_ta' => $_POST['mo_ta'],
                'gia_ban' => $_POST['gia_ban'],
                'gia_nhap' => $_POST['gia_nhap'],
                'gia_khuyen_mai' => $_POST['gia_khuyen_mai'],
                'so_luong' => $_POST['so_luong'],
                'hinh_anh' => $_POST['hinh_anh'],
                'trang_thai' => $_POST['trang_thai'],
                'ngay_nhap' => $_POST['ngay_nhap'],
                'luot_xem' => $_POST['luot_xem'],
                'mo_ta_chi_tiet' => $_POST['mo_ta_chi_tiet']
            ];

            $this->model->add($data);
            header("Location: index.php?act=list-Sanpham");
        } else {
            echo "Phương thức không hợp lệ!";
        }
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function showEditSanphamForm()
    {
        $id = $_GET['id'] ?? null;
        if ($id && is_numeric($id)) {
            $Sanpham = $this->model->getById($id);
            if ($Sanpham) {
                require "views/sanpham_edit.php";
            } else {
                echo "Không tìm thấy sản phẩm với ID: $id";
            }
        } else {
            echo "ID không hợp lệ!";
        }
    }

    // Cập nhật sản phẩm
    public function updateSanpham()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $data = [
                'danh_muc_id' => $_POST['danh_muc_id'],
                'ten_san_pham' => $_POST['ten_san_pham'],
                'mo_ta' => $_POST['mo_ta'],
                'gia_ban' => $_POST['gia_ban'],
                'gia_nhap' => $_POST['gia_nhap'],
                'gia_khuyen_mai' => $_POST['gia_khuyen_mai'],
                'so_luong' => $_POST['so_luong'],
                'hinh_anh' => $_POST['hinh_anh'],
                'trang_thai' => $_POST['trang_thai'],
                'ngay_nhap' => $_POST['ngay_nhap'],
                'luot_xem' => $_POST['luot_xem'],
                'mo_ta_chi_tiet' => $_POST['mo_ta_chi_tiet']
            ];

            $this->model->update($id, $data);
            header("Location: index.php?act=list-Sanpham");
        } else {
            echo "Phương thức không hợp lệ!";
        }
    }

    // Xóa sản phẩm
    public function deleteSanpham($id)
    {
        if ($id) {
            $this->model->delete($id);
            header("Location: index.php?act=list-Sanpham");
        } else {
            echo "ID không hợp lệ!";
        }
    }
}
