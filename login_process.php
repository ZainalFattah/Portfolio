<?php
require_once 'includes/db.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
  if ($password === $row['password']) {
    $_SESSION['username'] = $username;
    header("Location: pages/dashboard.php");
    exit;
  } else {
    echo "Password salah.";
  }
} else {
  echo "User tidak ditemukan.";
}
?>