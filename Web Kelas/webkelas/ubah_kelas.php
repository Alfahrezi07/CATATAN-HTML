<!DOCTYPE html>
<html :class="{ 'theme-dark': false }" x-data="data()" lang="en">

<head>
    <title>Dashboard admin</title>

    <?php session_start();
    require_once './views/header.php'; ?>
    <style>
        .njj {
            margin: 0 6px;
        }
    </style>
</head>

<body>
    <?php
    require_once "db.php";
    $id = $_GET['id'];

    if (!isset($id)) {
        header('Location: view_kelas.php');
        exit();
    }

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $wali_kelas_id = $_POST['wali_kelas_id'];
        $query = mysqli_query($koneksi, "UPDATE kelas SET id='$id', nama='$nama', wali_kelas_id='$wali_kelas_id' WHERE id=$id");
        if ($query) {
            echo "<script>
            window.location.href='view_kelas.php'
            </script>";
        } else {
            echo '<script>alert("Ubahh data gagal")</script>';
        }
    }

    $query = mysqli_query($koneksi, "SELECT k.nama as 'nama',g.nama as 'guru',g.id as 'id_guru' FROM kelas k INNER JOIN guru g ON k.wali_kelas_id = g.id WHERE k.id=$id");
    $data = mysqli_fetch_array($query);
    ?>


    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php require_once './views/sidebar.php'; ?>
        <div class="flex flex-col flex-1 w-full">
            <?php require_once './views/navbar.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Halaman ubah Kelas dan Wali Kelas
                    </h2>
                    <form method="post" action="">

                        <div>
                            <p><label for="" class="font-bold ">
                                    Nama: <input type="text" name="nama" style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm p-2 form-input w-full rounded"
                                        value="<?php echo $data['nama']; ?>"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold">
                                    Wali Kelas: <select name="wali_kelas_id" id=""
                                        style="border: 1px solid rgba(0,0,0,.5)"
                                        class="text-sm p-3 form-input w-full rounded ">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT g.*
                                                                        FROM guru g
                                                                        LEFT JOIN kelas k ON g.id = k.wali_kelas_id
                                                                        WHERE k.wali_kelas_id IS NULL;
                                                                        ");
                                        while ($guru = mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?= $guru['id'] ?>" class="text-sm">
                                                <?= $guru['nama']; ?>
                                            </option>
                                        <?php } ?>
                                        <option selected value="<?= $data['id_guru'] ?>" class="text-sm">
                                            <?= $data['guru']; ?>
                                        </option>
                                    </select>
                                </label></p>
                        </div>




                        <div class="py-4">

                            <button type="submit" name="submit" class="bg-blue-600 text-white p-2 rounded">Ubah
                            </button>
                        </div>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>