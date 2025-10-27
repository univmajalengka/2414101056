<?php
$host = 'localhost';
$user = 'tugaspabw_2414101056';
$pass = 'RISKA2414101056_';
$db   = 'tugaspabw_2414101056';

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function esc($s) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($s));
}
?>
