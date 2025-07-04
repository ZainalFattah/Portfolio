<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$link = $_POST['link'];

// Basic validation
if (empty($id) || empty($title) || empty($description) || empty($link)) {
    die("Error: Title, description, and link are required.");
}

if (!empty($_FILES['image']['name'])) {
  // Handle file upload
  $target_dir = "../assets/images/";
  $image_name = basename($_FILES["image"]["name"]);
  $target_file = $target_dir . $image_name;
  
  // Simple validation for image type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
  }

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    // Update with new image
    $sql = "UPDATE project SET nama=?, deskripsi=?, image=?, link=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $title, $description, $image_name, $link, $id);
  } else {
      die("Sorry, there was an error uploading your file.");
  }

} else {
  // Update without changing the image
  $sql = "UPDATE project SET nama=?, deskripsi=?, link=? WHERE id=?";
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "sssi", $title, $description, $link, $id);
}

if (mysqli_stmt_execute($stmt)) {
    header("Location: dashboard.php?status=success");
} else {
    header("Location: dashboard.php?status=error");
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
exit;
?>
