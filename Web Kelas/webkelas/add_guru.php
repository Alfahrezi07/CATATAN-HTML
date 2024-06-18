<!-- add_guru.php -->

<?php
session_start();
require_once ('db.php');

// if ($_SESSION['role'] != 'admin') {
//     header("location: index.php");
//     exit;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];

    $sql = "INSERT INTO guru (nip,nama) VALUES ('$nip','$nama')";
    if ($koneksi->query($sql) === TRUE) {
        header('Location: view_guru.php');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
    exit;
}
?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru</title>
</head>
<body>
<h1>Tambah Guru</h1>
    <form method="post" action="">
        ID: <input type="text" name="id"><br>
        Nama: <input type="text" name="nama"><br>
        <input type="submit" value="Tambah Guru">
    </form>
    <br>
    <a href="dashboard.php">Kembali ke Dashboard Admin</a>
</body>
</html> -->




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
                        Tambah Kelas
                    </h2>
                    <form method="post" action="">
                        <div>
                            <p><label for="" class="font-bold ">
                                    Nama Guru: <input type="text" name="nama" required
                                        style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm form-input p-2 w-full rounded"><br>
                                </label></p>
                        </div>
                        <div class="py-4">
                            <p><label for="" class="font-bold ">
                                    Nip: <input type="number" name="nip" required
                                        style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm form-input p-2 w-full rounded"><br>
                                </label></p>
                        </div>
                        <br>

                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Tambah Kelas</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>