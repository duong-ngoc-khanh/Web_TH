<?php
include 'db.php';

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM flowers WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Xóa thành công!";
        header("Location: admin.php");
        exit;
    } else {
        echo "Lỗi: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "ID không hợp lệ.";
    exit;
}

?>