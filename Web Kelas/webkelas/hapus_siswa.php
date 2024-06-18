<?php

require_once ('db.php');

if (isset($_GET['id'])) {


    $id = $_GET['id'];

    // $query = mysqli_query($koneksi, "DELETE FROM siswa WHERE id = '$id'");
    $sql = "DELETE FROM siswa WHERE id = $id";
    $query = $koneksi->query($sql);

    if ($query) {
        echo "<script>
            alert('Hapus data Berhasil')
            window.location.href='view_siswa.php'
            </script>";
    } else {
        echo "<script>
            alert('Hapus data Gagal')
            window.location.href='view_siswa.php'
            </script>";
    }
}

?>