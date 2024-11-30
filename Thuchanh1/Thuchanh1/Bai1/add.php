<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = 'images/' . basename($_FILES['image']['name']);

    // Lưu ảnh vào thư mục images/
    move_uploaded_file($_FILES['image']['tmp_name'], $image);

    // Thêm dữ liệu vào bảng
    $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$description', '$image')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm hoa mới</title>
</head>
<body>
    <h1>Thêm hoa mới</h1>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <label for="name">Tên hoa:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description" required></textarea><br>
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" id="image" required><br>
        <button type="submit">Thêm</button>
    </form>
</body>
</html>
