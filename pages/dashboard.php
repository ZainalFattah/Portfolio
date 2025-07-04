<?php
require_once '../includes/auth.php';
require_once '../includes/db.php';
$result = mysqli_query($conn, "SELECT * FROM project ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="#" class="logo">Dashboard</a>
            <ul class="nav-links">
                <li><a href="../index.php" target="_blank">View Site</a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <main class="container dashboard-container">
        <div class="dashboard-header">
            <h1>Manage Projects</h1>
            <a href="add_project.php" class="btn">+ Add New Project</a>
        </div>

        <table class="dashboard-table">
            <thead>
                <tr>
                    <th>Project Title</th>
                    <th style="width: 200px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td class="actions">
                        <a href="edit_project.php?id=<?= $row['id'] ?>">Edit</a>
                        <a href="delete_project.php?id=<?= $row['id'] ?>" class="danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Zainal Fattah. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
