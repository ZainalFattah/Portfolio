<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';

$title = $_POST['title'];
$description = $_POST['description'];
$link = $_POST['link'];
$target_dir = "../assets/images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
$image_path = basename($_FILES["image"]["name"]);

$sql = "INSERT INTO project (nama, deskripsi, image, link) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $title, $description, $image_path, $link);
mysqli_stmt_execute($stmt);
header("Location: dashboard.php");
exit;
?>