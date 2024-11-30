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
    <title>Danh sách hoa - Người dùng khách</title>
</head>
<body>
    <h1>Danh sách các loài hoa</h1>
    <?php if (empty($flowers)): ?>
        <p>Hiện chưa có loài hoa nào trong danh sách.</p>
    <?php else: ?>
        <div class="flowers">
            <?php foreach ($flowers as $flower): ?>
                <div class="flower-item" style="margin-bottom: 20px;">
                    <img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" width="300">
                    <h2><?= $flower['name'] ?></h2>
                    <p><?= $flower['description'] ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</body>
</html>
