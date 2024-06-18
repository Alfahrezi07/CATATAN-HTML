// wali_dashboard.php
<?php
session_start();
if ($_SESSION['role'] != 'wali_kelas') {
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard Wali Kelas</title>
</head>

<body>
    <h1>Dashboard Wali Kelas</h1>
    <a href="add_siswa.php">Tambah Siswa</a><br>
    <a href="lihat_curhat.php">Lihat Curhat</a><br>
    <a href="lihat_ide.php">Lihat Ide</a><br>
    <a href="add_respon_curhat.php">Beri Respon Curhat</a><br>
    <a href="add_respon_ide.php">Beri Respon Ide</a><br>
    <a href="add_catatan_perkembangan.php">Tulis Catatan Perkembangan</a><br>
    <a href="lihat_catatan_khusus.php">Lihat Catatan Khusus</a><br>
</body>

</html>