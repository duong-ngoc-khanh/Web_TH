<?php
    include 'db.php';
    include 'index.php';

    $stmt = $conn->prepare("SELECT * FROM flowers");
    $stmt->execute();
    $result = $stmt->get_result();

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
    <title>Danh sách hoa</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel ="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <?php if (empty($flowers)): ?>
            <div class="alert alert-warning text-center">
                Hiện chưa có loài hoa nào trong danh sách.
            </div>
        <?php else: ?>
            <div class="row">
                <?php foreach ($flowers as $flower): ?>
                    <div class="col-md-4 flower-item">
                        <div class="card shadow-sm">
                            <img src="<?= $flower['image'] ?>" class="card-img-top" alt="<?= $flower['name'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $flower['name'] ?></h5>
                                <p class="card-text"><?= $flower['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>