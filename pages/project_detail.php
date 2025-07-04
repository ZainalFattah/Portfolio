<?php
require_once '../includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: ../project.php');
    exit;
}

$id = $_GET['id'];
$stmt = mysqli_prepare($conn, "SELECT * FROM project WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$project = mysqli_fetch_assoc($result);

if (!$project) {
    header('Location: ../project.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($project['nama']) ?> - Project Details</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a href="../index.php" class="logo">ZainalFattah</a>
            <ul class="nav-links">
                <li><a href="../index.php#home">Beranda</a></li>
                <li><a href="../project.php">Project</a></li>
                <li><a href="../index.php#about">Tentang</a></li>
            </ul>
        </div>
    </nav>

    <main class="container" style="padding-top: 120px; padding-bottom: 60px; position: relative;">
        <div class="project-detail-buttons-top">
            <a href="../project.php" class="btn btn-secondary">Back to Projects</a>
            <a href="<?= htmlspecialchars($project['link']) ?>" class="btn-visit-link" target="_blank">Visit Project</a>
        </div>
        <div class="project-detail-header">
            <h1><?= htmlspecialchars($project['nama']) ?></h1>
        </div>
        <img src="../assets/images/<?= htmlspecialchars($project['image']) ?>" alt="<?= htmlspecialchars($project['nama']) ?>" class="project-detail-image">
        <div class="project-detail-content">
            <h2>About This Project</h2>
            <p><?= nl2br(htmlspecialchars($project['deskripsi'])) ?></p>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2025 Zainal Fattah. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>