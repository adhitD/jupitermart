<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-container">
  <div class="login-card">
    <div class="login-header">
      <h2>Register</h2>
    </div>

    <form action="databases/prosesRegister.php" method="POST" class="login-form">

      <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="name" required>
      </div>

      <div class="form-group">
        <label>Email (Username)</label>
        <input type="email" name="email" required>
      </div>

      <div class="form-group">
        <label>No. Telepon</label>
        <input type="text" name="phone" required>
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <textarea name="address" required></textarea>
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary btn-login">Daftar</button>

    </form>

    <p style="margin-top:10px;">Sudah punya akun? <a href="login.php">Login</a></p>
  </div>
</div>

</body>
</html>
