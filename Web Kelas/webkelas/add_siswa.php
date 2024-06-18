<!-- // add_siswa.php -->

<?php
session_start();
require_once ('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $nisn = $_POST['nisn'];
    $alamat = $_POST['alamat'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO siswa (nama, nis, nisn, alamat, tgl_lahir, id_kelas) VALUES ('$nama', '$nis', '$nisn', '$alamat', '$tgl_lahir', '$kelas')";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>
        window.location.href='view_siswa.php'
        </script>";
    } else {
        echo "<script>
        alert('Data siswa baru gagal ditambahkan')
        window.location.href='view_siswa.php'
        </script>";
    }
}
?>




<!DOCTYPE html>
<html :class="{ 'theme-dark': false }" x-data="data()" lang="en">

<head>
    <title>Dashboard Siswa</title>
    <?php require_once './views/header.php'; ?>
    <style>
        .njj {
            margin: 0 6px;
        }
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php require_once './views/sidebar.php'; ?>
        <div class="flex flex-col flex-1 w-full">
            <?php require_once './views/navbar.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Halaman Tambah Siswa
                    </h2>
                    <form method="post" action="">
                        <div>
                            <p><label for="" class="font-bold ">
                                    Nama: <input type="text" name="nama" required
                                        style="border: .5px solid rgba(0,0,0,.2)"
                                        class="text-sm p-2 lx-3 form-input w-full rounded"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    NIS: <input type="text" name="nis" required
                                        style="border: .5px solid rgba(0,0,0,.2)"
                                        class="text-sm p-2 lx-3 form-input w-full rounded"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    NISN: <input type="text" name="nisn" required
                                        style="border: .5px solid rgba(0,0,0,.2)"
                                        class="text-sm p-2 lx-3 form-input w-full rounded"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Alamat: <input type="text" name="alamat" required
                                        style="border: .5px solid rgba(0,0,0,.2)"
                                        class="text-sm p-2 lx-3 form-input w-full rounded"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Tanggal Lahir: <input type="date" name="tgl_lahir" required
                                        style="border: .5px solid rgba(0,0,0,.2)"
                                        class="text-sm p-2 lx-3 form-input w-full rounded"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Kelas: <select name="kelas" style="border: .5px solid rgba(0,0,0,.2)"
                                        class="text-sm p-2 lx-3 form-input w-full rounded">
                                        <?php
                                        $result = $koneksi->query("SELECT id, nama FROM kelas");
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<option value='" . $row['id'] . "'>" . $row['nama'] . "</option>";
                                        }
                                        ?>
                                    </select><br><br><br>
                                </label></p>
                        </div>





                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Tambah Siswa</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>