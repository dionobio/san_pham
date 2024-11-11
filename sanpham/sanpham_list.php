<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Sản Phẩm</title>
</head>
<body>
    <h1>Danh Sách Sản Phẩm</h1>
    <a href="index.php?act=add-product">Thêm Sản Phẩm Mới</a>
    <table border="1">
    <tr>
        <th>ID</th>
        <th>Tên Sản Phẩm</th>
        <th>Mô Tả</th>
        <th>Giá Bán</th>
        <th>Giá Nhập</th>
        <th>Giá Khuyến Mãi</th>
        <th>Số Lượng</th>
        <th>Trạng Thái</th>
        <th>Hành Động</th>
    </tr>
    <?php foreach ($Sanphams as $Sanpham): ?>
    <tr>
        <td><?= $Sanpham['id'] ?></td>
        <td><?= htmlspecialchars($Sanpham['ten_san_pham']) ?></td>
        <td><?= htmlspecialchars($Sanpham['mo_ta']) ?></td>
        <td><?= number_format($Sanpham['gia_ban']) ?></td>
        <td><?= number_format($Sanpham['gia_nhap']) ?></td>
        <td><?= number_format($Sanpham['gia_khuyen_mai']) ?></td>
        <td><?= $Sanpham['so_luong'] ?></td>
        <td><?= $Sanpham['trang_thai'] ?></td>
        <td>
            <a href="index.php?act=edit-Sanpham&id=<?= $Sanpham['id'] ?>">Sửa</a>
            <a href="index.php?act=delete-Sanpham&id=<?= $Sanpham['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
