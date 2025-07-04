<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM project WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Project</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="dashboard.php" class="logo">Dashboard</a>
        </div>
    </nav>
    <div class="form-container">
        <h2>Edit Project</h2>
        <form action="edit_project_process.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($row['nama']) ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required><?= htmlspecialchars($row['deskripsi']) ?></textarea>
            </div>
            <div class="form-group">
                <label for="image">Current Image</label>
                <img src="../assets/images/<?= htmlspecialchars($row['image']) ?>" alt="Current Image" style="max-width: 200px; display: block; margin-bottom: 1rem;">
                <label for="image">New Image (optional)</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>
            <div class="form-group">
                <label for="link">Project Link</label>
                <input type="url" id="link" name="link" value="<?= htmlspecialchars($row['link']) ?>" required>
            </div>
            <button type="submit" class="btn" style="width: 100%;">Save Changes</button>
        </form>
    </div>
</body>
</html>
