<?php
session_start();
include 'koneksi.php';

// Ambil input
$name     = $_POST['name'];
$email    = $_POST['email'];
$password = $_POST['password'];
$phone    = $_POST['phone'];
$address  = $_POST['address'];
$role     = "user"; // default user biasa

// Cek email sudah terdaftar
$sql = "SELECT id FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<script>alert('Email sudah terdaftar!'); window.location.href='../admin/register.php';</script>";
    exit;
}

// Enkripsi password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Simpan user baru
$sql = "INSERT INTO users (name, email, password, phone, address, role) 
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $email, $hashedPassword, $phone, $address, $role);

if ($stmt->execute()) {
    echo "<script>alert('Registrasi berhasil! Silakan login.'); window.location.href='../admin/login.php';</script>";
} else {
    echo "<script>alert('Gagal registrasi!'); window.location.href='../register.php';</script>";
}

$stmt->close();
$conn->close();
