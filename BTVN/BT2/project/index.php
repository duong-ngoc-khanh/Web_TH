<?php include 'header.php'; ?>
<?php include 'products.php'; ?>
<main>
    <div class="d-flex flex-column align-items-center mb-3">
        <h3>Danh sách sản phẩm</h3>
    </div>
    <div class="container">
        <a href="add_product.php" class="btn btn-success mb-3">Thêm mới</a>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)) : ?>
                    <tr><td colspan="4">Không có sản phẩm nào.</td></tr>
                <?php else: ?>
                    <?php foreach ($products as $index => $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?>VND</td>
                            <td>
                                <a href="edit_product.php?index=<?= $index ?>" class="text-primary">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <a href="delete_product.php?index=<?= $index ?>" 
                                   class="text-danger"
                                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    <i class="bi bi-trash-fill"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>
<?php include 'footer.php'; ?>