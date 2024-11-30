<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM flowers WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Lỗi: " . $conn->error;
}
?>
