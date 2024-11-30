<?php
include 'db.php';

// Lấy dữ liệu từ bảng flowers
$sql = "SELECT * FROM flowers";
$result = $conn->query($sql);

$flowers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $flowers[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý danh sách hoa</title>
</head>
<body>
    <h1>Quản lý danh sách hoa</h1>
    <a href="add.php">Thêm hoa mới</a>
    <?php if (empty($flowers)): ?>
        <p>Hiện chưa có loài hoa nào trong danh sách. Hãy <a href="add.php">thêm hoa mới</a>.</p>
    <?php else: ?>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $flower): ?>
                    <tr>
                        <td><?= $flower['id'] ?></td>
                        <td><?= $flower['name'] ?></td>
                        <td><?= $flower['description'] ?></td>
                        <td><img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" width="100"></td>
                        <td>
                            <a href="edit.php?id=<?= $flower['id'] ?>">Sửa</a>
                            <a href="delete.php?id=<?= $flower['id'] ?>">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
