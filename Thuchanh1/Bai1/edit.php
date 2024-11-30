<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = 'images/';
        $target_file = $target_dir . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($imageFileType, $allowed_types)) {
            die("Chỉ được tải lên các file JPG, JPEG, PNG, hoặc GIF.");
        }

        if ($_FILES['image']['size'] > 5 * 1024 * 1024) {
            die("File tải lên không được vượt quá 5MB.");
        }

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image = $target_file;

            $stmt = $conn->prepare("UPDATE flowers SET name=?, description=?, image=? WHERE id=?");
            $stmt->bind_param("sssi", $name, $description, $image, $id);
            if ($stmt->execute()) {
                header("Location: admin.php");
                exit;
            } else {
                echo "Lỗi: " . $stmt->error;
            }
            
        } else {
            die("Không thể tải file lên. Vui lòng thử lại.");
        }
    } else {
        $stmt = $conn->prepare("UPDATE flowers SET name=?, description=?, image=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $description, $image, $id);
        if ($stmt->execute()) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Lỗi: " . $stmt->error;
        }
        
    }
}
?>