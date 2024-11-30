
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Danh sách các loài hoa
            </a>
            <div class="collapse navbar-collapse">

            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <button class="btn btn-success mb-3">Thêm mới</button>
        <table class="table table-boardreed">
            <thead class="table-light">
                <tr>
                    <th>Loài Hoa </th>
                    <th>Mô Tả </th>
                    <th>Hình Ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $products = [
                    ["name" => "Sản phẩm 1", "price" => "1000VND","anh"=> "anh/1.jpg"],
                    ["name" => "Sản phẩm 2", "price" => "2000VND","anh"=> "anh/k.jpg"],
                    ["name" => "Sản phẩm 3", "price" => "3000VND","anh"=> "anh/1.jpg"]
                ];

                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td>{$product['name']}</td>";
                    echo "<td>{$product['price']}</td>";
                    echo "<td>{$product['anh']}</td>";

                    echo "<td><a href='#' class='text-primary'><i class='bi bi-pencil'></i></a></td>";
                    echo "<td><a href='#' class='text-danger'><i class='bi bi-trash'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <footer class="bg-light text-center mt-4 py-3">
        <hr class="border border-dark"><p class="m-0">TLU's MUSIC GARDEN</p>
    </footer>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
</body>
</html>