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
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Quản lý danh sách hoa</title>
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
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
                        <h1>


                        </h1>
						<h2>  Quản lý Danh sách Hoa</h2>
					</div>
					
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tên Hoa</th>
						<th>Mô Tả</th>
						<th>Hình Ảnh</th>
						<th>Hành động</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($flowers)): ?>
						<?php foreach ($flowers as $flower): ?>
							<tr>
								<td><?= $flower['id'] ?></td>
								<td><?= $flower['name'] ?></td>
								<td><?= $flower['description'] ?></td>
								<td><img src="<?= $flower['image'] ?>" alt="<?= $flower['name'] ?>" width="80"></td>
								<td>
									<a href="#editModal<?= $flower['id'] ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
									<a href="#deleteModal<?= $flower['id'] ?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i></a>
								</td>
							</tr>
							<!-- Edit Modal -->
							<div id="editModal<?= $flower['id'] ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form action="edit.php" method="post" enctype="multipart/form-data">
											<div class="modal-header">						
												<h4 class="modal-title">Sửa hoa</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">
												<input type="hidden" name="id" value="<?= $flower['id'] ?>">
												<div class="form-group">
													<label>Tên Hoa</label>
													<input type="text" name="name" class="form-control" value="<?= $flower['name'] ?>" required>
												</div>
												<div class="form-group">
													<label>Mô Tả</label>
													<textarea name="description" class="form-control" required><?= $flower['description'] ?></textarea>
												</div>
												<div class="form-group">
													<label>Hình Ảnh</label>
													<input type="file" name="image" class="form-control">
												</div>					
											</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
												<input type="submit" class="btn btn-info" value="Lưu">
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- Delete Modal -->
							<div id="deleteModal<?= $flower['id'] ?>" class="modal fade">
								<div class="modal-dialog">
									<div class="modal-content">
										<form action="delete.php" method="post">
											<div class="modal-header">						
												<h4 class="modal-title">Xóa hoa</h4>
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											</div>
											<div class="modal-body">					
												<p>Bạn có chắc chắn muốn xóa hoa này không?</p>
												<p class="text-warning"><small>Hành động này không thể hoàn tác.</small></p>
												<input type="hidden" name="id" value="<?= $flower['id'] ?>">
											</div>
											<div class="modal-footer">
												<input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
												<input type="submit" class="btn btn-danger" value="Xóa">
											</div>
										</form>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<tr>
							<td colspan="5" class="text-center">Chưa có dữ liệu!</td>
						</tr>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>        
</div>
<!-- Add Modal -->
<div id="addModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="add.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">						
                    <h4 class="modal-title">Thêm hoa mới</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">					
                    <div class="form-group">
                        <label>Tên Hoa</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Mô Tả</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Hình Ảnh</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>					
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                    <input type="submit" class="btn btn-success" value="Thêm">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-sm-6" style="position: relative;">
    <a href="#addModal" class="btn btn-success" data-toggle="modal" style="position: absolute; right: 0;"><i class="material-icons">&#xE147;</i> <span>Thêm hoa mới</span></a>
</div>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
</body>
</html>