<?php
include 'db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM flowers WHERE id = $id";
$result = $conn->query($sql);
$flower = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $flower['image'];

    if (!empty($_FILES['image']['name'])) {
        $image = 'images/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $sql = "UPDATE flowers SET name = '$name', description = '$description', image = '$image' WHERE id = $id";
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
    <title>Sửa hoa</title>
</head>
<body>
    <h1>Sửa hoa</h1>
    <form action="edit.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <label for="name">Tên hoa:</label>
        <input type="text" name="name" id="name" value="<?= $flower['name'] ?>" required><br>
        <label for="description">Mô tả:</label>
        <textarea name="description" id="description" required><?= $flower['description'] ?></textarea><br>
        <label for="image">Hình ảnh:</label>
        <input type="file" name="image" id="image"><br>
        <button type="submit">Lưu</button>
    </form>
</body>
</html>
