<?php
session_start();
require_once ('db.php');


$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $wali_kelas_id = $_POST['wali_kelas_id'];

    $sql = "INSERT INTO kelas ( nama, wali_kelas_id) VALUES ( '$nama', '$wali_kelas_id')";
    if ($koneksi->query($sql) === TRUE) {
        header('Location: view_kelas.php');
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
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
                        Tambah Kelas
                    </h2>
                    <form method="post" action="">
                        <div>
                            <p><label for="" class="font-bold ">
                                    Nama Kelas: <input type="text" name="nama" required
                                        style="border: 1px solid rgba(0,0,0,.5)"
                                        class="text-sm form-input p-2 px-3 text-sm w-full rounded" name="nama"><br>
                                </label></p>
                        </div>
                        <div class="py-4">
                            <p><label for="" class="font-bold">
                                    Wali Kelas: <select name="wali_kelas_id" id=""
                                        style="border: 1px solid rgba(0,0,0,.5)" class="text-sm p-3 w-full rounded ">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT g.*
                                                                        FROM guru g
                                                                        LEFT JOIN kelas k ON g.id = k.wali_kelas_id
                                                                        WHERE k.wali_kelas_id IS NULL;
                                                                        ");
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id'] ?>" class="text-sm"><?= $data['nama']; ?>
                                                </option>
                                        <?php } ?>
                                    </select>
                                </label></p>
                            <br>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Tambah Kelas</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>