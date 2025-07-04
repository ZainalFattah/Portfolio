<?php
require_once 'includes/db.php';
$project_result = mysqli_query($conn, "SELECT * FROM project ORDER BY id DESC LIMIT 3");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zainal Fattah - Web & 3D Developer</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <nav class="navbar">
    <div class="container">
      <a href="#home" class="logo">ZainalFattah</a>
      <ul class="nav-links">
        <li><a href="#home">Beranda</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#education">Pendidikan</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
      <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
    </div>
  </nav>

  <header id="home" class="hero">
    <div class="hero-content">
      <h1>Hi, I'm Zainal Fattah</h1>
      <p>I am a student of Informatics Engineering with a passion for self-learning in Web Development, Mobile Development, Machine Learning, Data Analyst, Data Science, IoT, and AI. I create immersive, interactive experiences by blending code and creativity.</p>
      <a href="#projects" class="btn">View My Work</a>
    </div>
    <div class="hero-canvas-container">
      <canvas id="three-canvas"></canvas>
    </div>
  </header>

  <section id="projects" class="home-projects">
    <div class="container">
      <div class="section-header">
        <h2>Recent Projects</h2>
        <p>Here are a few of my latest creations.</p>
      </div>
      <div class="project-gallery">
        <?php
        while ($row = mysqli_fetch_assoc($project_result)) {
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
      </div>
      <div class="view-all-btn-container">
        <a href="project.php" class="btn">View All Projects</a>
      </div>
    </div>
  </section>

  <section id="about" class="about">
    <div class="container">
      <h2>About Me</h2>
      <p class="about-summary">I'm a student of Informatics Engineering at Universitas Islam Sultan Agung Semarang. I'm passionate about self-learning, especially in Web Development, Mobile Development, Machine Learning, Data Analyst, Data Science, IoT, and AI. I believe that continuous learning and growth are key to becoming a successful professional.</p>
      <div class="social-links">
        <a href="mailto:zainalfattah100@gmail.com" aria-label="Email"><i class="fas fa-envelope"></i></a>
        <a href="https://linkedin.com/in/zainalfattah" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
        <a href="https://github.com/zainalfattah" target="_blank" aria-label="GitHub"><i class="fab fa-github"></i></a>
        <a href="https://www.codewars.com/users/SamuraiKebenaran" target="_blank" aria-label="Codewars"><i class="fas fa-code"></i></a>
        <a href="https://wa.me/6287826072367" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="https://instagram.com/zainaldammisty" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      </div>
      <br>
      <div class="skills-section">
        <h3>Skills</h3>
        <ul class="skills-list">
          <li><i class="fa-brands fa-python"></i> Python</li>
          <li><i class="fa-brands fa-php"></i> PHP & CodeIgniter4</li>
          <li><i class="fa-brands fa-html5"></i> HTML & CSS</li>
          <li><i class="fa-brands fa-js"></i> JavaScript</li>
          <li><i class="fa-solid fa-brain"></i> Machine Learning</li>
          <li><i class="fa-solid fa-chart-simple"></i> Data Analysis</li>
          <li><i class="fa-solid fa-database"></i> MySQL</li>
          <li><i class="fa-solid fa-cube"></i> 3D Design</li>
        </ul>
      </div>
    </div>
  </section>

  <section id="education" class="education-section">
    <div class="container">
        <h3>Education</h3>
        <ul class="timeline">
          <li style="--accent-color:#41516C">
            <div class="date">2010–2016</div>
            <div class="title">SDN Wonokerto 1</div>
            <div class="descr"></div>
          </li>
          <li style="--accent-color:#FBCA3E">
            <div class="date">2016–2019</div>
            <div class="title">MTsN 3 Demak</div>
            <div class="descr"></div>
          </li>
          <li style="--accent-color:#E24A68">
            <div class="date">2019–2022</div>
            <div class="title">SMKN 1 Demak</div>
            <div class="descr">Multimedia</div>
          </li>
          <li style="--accent-color:#1B5F8C">
            <div class="date">Agu 2023 - Sekarang</div>
            <div class="title">Universitas Islam Sultan Agung Semarang</div>
            <div class="descr">S.Kom, Informatika</div>
          </li>
        </ul>
    </div>
  </section>
  <br>
  <footer class="footer">
    <div class="container">
      <p>&copy; 2025 Zainal Fattah. All Rights Reserved.</p>
    </div>
  </footer>
  <script type="module" src="assets/js/main.js"></script>
  <script src="assets/js/nav.js"></script>
</body>

</html>