<!-- <?php
session_start();
require_once ('db.php');

if ($_SESSION['role'] != 'admin') {
    header("location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];

    $sql = "INSERT INTO wali_kelas (nama) VALUES ('$nama')";
    if ($koneksi->query($sql) === TRUE) {
        echo "Wali Kelas baru berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Wali Kelas</title>
</head>

<body>
    <h1>Tambah Wali Kelas</h1>
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br>
        <input type="submit" value="Tambah Wali Kelas">
    </form>
    <a href="dashboard.php">Kembali ke Dashboard Admin</a>
</body>

</html> -->