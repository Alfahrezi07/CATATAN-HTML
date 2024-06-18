<!-- lihat_siswa.php -->
<?php
require_once ('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nis = $_POST['nis'];
    $tgl_lahir = $_POST['tgl_lahir'];

    if (empty($nis) || empty($tgl_lahir)) {

        echo "<script>alert('inputan tidak valid')</script>";

    } else {

        $sql = "SELECT * FROM siswa WHERE nis='$nis' AND tgl_lahir='$tgl_lahir'";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $id_siswa = $row['id'];

            header("Location: detail_siswa.php?id={$id_siswa}");

            exit(200);
        } else {
            echo "<script>alert('data siswa tidak valid!')</script>";
        }
    }
} else {
    header("Location: dashboard.php");
}

?>