<?php require_once '../includes/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add New Project</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="dashboard.php" class="logo">Dashboard</a>
        </div>
    </nav>
    <div class="form-container">
        <h2>Add New Project</h2>
        <form action="add_project_process.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter project title" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" placeholder="Enter project description" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Project Image</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="link">Project Link</label>
                <input type="url" id="link" name="link" placeholder="Enter project link" required>
            </div>
            <button type="submit" class="btn" style="width: 100%;">Add Project</button>
        </form>
    </div>
</body>
</html>
