<?php
// Đọc tệp CSV
$accounts = [];
$file = fopen("accounts.csv", "r");

if ($file !== false) {
    // Đọc tiêu đề cột từ tệp CSV
    $headers = fgetcsv($file);
    
    // Kiểm tra số cột trong tiêu đề và mỗi dòng dữ liệu
    $expectedColumns = count($headers);
    
    // Đọc dữ liệu các dòng còn lại
    while (($row = fgetcsv($file)) !== false) {
        if (count($row) == $expectedColumns) {
            // Nếu số cột đúng, gắn kết tiêu đề và dữ liệu
            $accounts[] = array_combine($headers, $row);
        } else {
            // Xử lý khi số cột không khớp
            echo "Dữ liệu không khớp với tiêu đề trong dòng: " . implode(",", $row) . "<br>";
        }
    }
    fclose($file);
} else {
    die("Không thể mở tệp tin CSV!");
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Tài khoản</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Danh sách Tài khoản</h1>
    
    <?php if (count($accounts) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Mật khẩu</th>
                    <th>Họ</th>
                    <th>Tên</th>
                    <th>Thành phố</th>
                    <th>Khóa học</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($accounts as $account): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($account['username']); ?></td>
                        <td><?php echo htmlspecialchars($account['email']); ?></td>
                        <td><?php echo htmlspecialchars($account['password']); ?></td>
                        <td><?php echo htmlspecialchars($account['lastname']); ?></td>
                        <td><?php echo htmlspecialchars($account['firstname']); ?></td>
                        <td><?php echo htmlspecialchars($account['city']); ?></td>
                        <td><?php echo htmlspecialchars($account['course1']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có dữ liệu để hiển thị.</p>
    <?php endif; ?>
</body>
</html>
