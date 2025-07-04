<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM project WHERE id=$id");
header("Location: dashboard.php");
exit;
?>