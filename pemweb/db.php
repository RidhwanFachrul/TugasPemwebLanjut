<?php
// Informasi koneksi ke database
$servername = "localhost"; // Nama server
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi pengguna database
$dbname = "tugas_pemweb"; // Nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}