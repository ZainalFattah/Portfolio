<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Admin Dashboard</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="form-container">
    <h2>Admin Login</h2>
    <form method="POST" action="login_process.php">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter your username" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn" style="width: 100%;">Login</button>
    </form>
  </div>
</body>
</html>
