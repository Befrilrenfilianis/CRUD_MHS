<?php
$koneksi = new mysqli('localhost', 'root', '','akademik');
if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
} 
?>