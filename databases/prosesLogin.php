<?php
session_start();
include 'koneksi.php';

// Ambil data form
$email = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT id, name, email, password, role FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Cek user
if ($result->num_rows === 1) {

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

        // Simpan session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name']    = $user['name'];
        $_SESSION['email']   = $user['email'];
        $_SESSION['role']    = $user['role'];

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            header("Location: ../admin/index.php");
        } else {
            header("Location: ../user/index.php");
        }
        exit;

    } else {
        echo "<script>alert('Password salah!'); window.location.href='../admin/login.php';</script>";
    }

} else {
    echo "<script>alert('User tidak ditemukan!'); window.location.href='../admin/login.php';</script>";
}

$stmt->close();
$conn->close();
