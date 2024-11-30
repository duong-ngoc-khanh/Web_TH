<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="icon/bootstrap-icons.min.css">
</head>
<body>
    <?php 
    include 'header.php';
    include 'products.php';
    
    $index = $_GET['index'] ?? 0;
    $product = $products[$index] ?? null;
    
    if (!$product) {
        header("Location: index.php");
        exit();
    }
    ?>
    
    <div class="container mt-4">
        <h3>Sửa sản phẩm</h3>
        <form action="update_product.php" method="POST">
            <input type="hidden" name="index" value="<?php echo $index; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="name" name="name" 
                       value="<?php echo htmlspecialchars($product['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" 
                       value="<?php echo htmlspecialchars($product['price']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="index.php" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>