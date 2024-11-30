<?php
// Đặt session_start() ngay đầu file
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả bài thi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Kết quả bài thi</h1>
    <?php
    if (isset($_SESSION['score']) && isset($_SESSION['total'])) {
        $score = $_SESSION['score'];
        $total = $_SESSION['total'];

        // Hiển thị kết quả
        echo "<div class='alert alert-success text-center mt-4'>";
        echo "Bạn trả lời đúng <strong>$score</strong>/$total câu.";
        echo "</div>";

        // Xóa session sau khi hiển thị
        session_destroy();
    } else {
        echo "<div class='alert alert-danger text-center mt-4'>Không có dữ liệu kết quả. Hãy làm bài kiểm tra trước.</div>";
    }
    ?>
    <div class="text-center mt-3">
        <a href="index.php" class="btn btn-primary">Làm lại</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>