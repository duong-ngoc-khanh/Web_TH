<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    // Đọc sản phẩm hiện có
    include 'products.php';
    
    // Thêm sản phẩm mới
    $products[] = ['name' => $name, 'price' => $price];
    
    // Lưu lại vào file
    $content = "<?php\n\$products = " . var_export($products, true) . ";\n?>";
    file_put_contents('products.php', $content);
    
    header("Location: index.php");
    exit();
}