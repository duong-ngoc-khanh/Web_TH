<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "ququiz_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$files = glob("*.txt");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_file'])) {
    $file = $_POST['selected_file'];
    $content = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    $question = "";
    $option_a = "";
    $option_b = "";
    $option_c = "";
    $option_d = "";
    $correct_option = "";

    foreach ($content as $line) {
        $line = trim($line);

        if (preg_match('/^Câu \d+:/', $line)) {
            if (!empty($question)) {
                $sql = "INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_option) 
                        VALUES ('$question', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_option')";
                $conn->query($sql);
            }

            $question = $conn->real_escape_string($line);
            $option_a = $option_b = $option_c = $option_d = $correct_option = "";
        } elseif (preg_match('/^A\./', $line)) {
            $option_a = $conn->real_escape_string(substr($line, 3));
        } elseif (preg_match('/^B\./', $line)) {
            $option_b = $conn->real_escape_string(substr($line, 3));
        } elseif (preg_match('/^C\./', $line)) {
            $option_c = $conn->real_escape_string(substr($line, 3));
        } elseif (preg_match('/^D\./', $line)) {
            $option_d = $conn->real_escape_string(substr($line, 3));
        } elseif (preg_match('/^Đáp án:/', $line)) {
            $correct_option = $conn->real_escape_string(substr($line, 8));
        }
    }

    if (!empty($question)) {
        $sql = "INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_option) 
                VALUES ('$question', '$option_a', '$option_b', '$option_c', '$option_d', '$correct_option')";
        $conn->query($sql);
    }

    echo "<div class='alert alert-success'>Dữ liệu đã được lưu từ file <strong>$file</strong> thành công!</div>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn File Từ Thư Mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Chọn File Câu Hỏi Từ Thư Mục</h1>
    <form method="post">
        <div class="mb-3">
            <label for="selected_file" class="form-label">Chọn file:</label>
            <select name="selected_file" id="selected_file" class="form-select" required>
                <option value="">-- Chọn file --</option>
                <?php
                foreach ($files as $file) {
                    echo "<option value='$file'>$file</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Lưu Dữ Liệu</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>