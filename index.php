<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/SanphamController.php';

// Require toàn bộ file Models
require_once 'models/SanphamModel.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'                 => (new DashboardController())->index(),
    // khuyen mai

    'list-sanpham'       => (new SanphamController())->showSanphamList(),
    'add-sanpham'        => (new SanphamController())->showAddSanphamForm(),
    'add-sanpham-submit' => (new SanphamController())->addSanpham(),
    'edit-sanpham'       => (new SanphamController())->showEditSanphamForm(),
    'update-sanpham'     => (new SanphamController())->updateSanpham(),
    'delete-sanpham'     => (new SanphamController())->deleteSanpham($_GET['id'] ?? null),
};