<?php
if (isset($_GET['index'])) {
    $index = $_GET['index'];
    
    include 'products.php';
    
    if (isset($products[$index])) {
        array_splice($products, $index, 1);
        
        $content = "<?php\n\$products = " . var_export($products, true) . ";\n?>";
        file_put_contents('products.php', $content);
    }
    
    header("Location: index.php");
    exit();
}