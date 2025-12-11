<?php
session_start();
include 'koneksi.php'; // file koneksi yang kamu buat

// Ambil data dari form
$username = $_POST['username'];
$password = $_POST['password'];

// Query cek user berdasarkan email (username kamu = email)
$sql = "SELECT id, name, email, password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah user ada di database
if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  // Verifikasi password
  if (password_verify($password, $user['password'])) {

    // Simpan ke session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];

    // Redirect ke dashboard
    header("Location: ../admin/index.php");
    exit;
  } else {
    // Password salah
    echo "<script>alert('Password salah!'); window.location.href='../admin/login.php';</script>";
  }
} else {
  // Username tidak ditemukan
  echo "<script>alert('User tidak ditemukan!'); window.location.href='../admin/login.php';</script>";
}

$stmt->close();
$conn->close();
