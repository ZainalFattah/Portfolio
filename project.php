<?php
require_once 'includes/db.php';
$result = mysqli_query($conn, "SELECT * FROM project ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Projects - Zainal Fattah</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar">
    <div class="container">
      <a href="index.php" class="logo">ZainalFattah</a>
      <ul class="nav-links">
        <li><a href="index.php#home">Beranda</a></li>
        <li><a href="index.php#about">Tentang</a></li>
        <li><a href="project.php">Project</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>
  </nav>

  <header class="page-header">
      <div class="container">
          <h1>My Projects</h1>
          <p>A collection of my works, blending creativity with technology.</p>
      </div>
  </header>

  <main class="container">
      <section class="project-gallery">
        <?php 
        while ($row = mysqli_fetch_assoc($result)) { 
            $description = htmlspecialchars($row['deskripsi']);
            $short_desc = strlen($description) > 100 ? substr($description, 0, 100) . '...' : $description;
        ?>
          <div class="project-card">
            <img src="assets/images/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['nama']) ?>">
            <div class="project-card-content">
              <h3><?= htmlspecialchars($row['nama']) ?></h3>
              <p><?= $short_desc ?></p>
              <a href="pages/project_detail.php?id=<?= $row['id'] ?>" class="btn-more">View More</a>
            </div>
          </div>
        <?php } ?>
      </section>
  </main>

  <footer class="footer">
    <div class="container">
      <p>&copy; 2025 Zainal Fattah. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
