<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Dashboard</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>

  <div class="login-container">
    <div class="login-card">
      <div class="login-header">
        <h2>Admin Login</h2>
      </div>
      <form action="../databases/prosesLogin.php" method="POST" class="login-form">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-login">Login</button>
      </form>
    </div>
  </div>

</body>

</html>