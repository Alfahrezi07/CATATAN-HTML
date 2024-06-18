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



    <?php
    require_once "db.php";
    session_start();

    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $nis = $_POST['nis'];
        $nisn = $_POST['nisn'];
        $alamat = $_POST['alamat'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $query = mysqli_query($koneksi, "UPDATE siswa SET id='$id', nama='$nama', nis='$nis', nisn='$nisn', alamat='$alamat', tgl_lahir='$tgl_lahir' WHERE id=$id");
        if ($query) {
            echo "<script>
            window.location.href='view_siswa.php'
            </script>";
        } else {
            echo '<script>alert("Ubahh data gagal")</script>';
        }
    }

    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id=$id");
    $data = mysqli_fetch_array($query);
    ?>


    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php require_once './views/sidebar.php'; ?>
        <div class="flex flex-col flex-1 w-full">
            <?php require_once './views/navbar.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Halaman ubah Siswa
                    </h2>
                    <form method="post" action="">

                        <div>
                            <p><label for="" class="font-bold ">
                                    Nama: <input type="text" name="nama" style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm form-input p-3 w-full rounded"
                                        value="<?php echo $data['nama']; ?>"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Nis: <input type="number" name="nis" style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm form-input p-3 w-full rounded"
                                        value="<?php echo $data['nis']; ?>"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Nisn: <input type="number" name="nisn" style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm form-input p-3 w-full rounded"
                                        value="<?php echo $data['nisn']; ?>"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Alamat: <input type="text" name="alamat" style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm form-input p-3 w-full rounded"
                                        value="<?php echo $data['alamat']; ?>"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Tanggal Lahir: <input type="date" name="tgl_lahir"
                                        style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm form-input p-3 w-full rounded"
                                        value="<?php echo $data['tgl_lahir']; ?>"><br><br>
                                </label></p>
                        </div>






                        <button type="submit" name="submit" class="bg-blue-600 text-white p-2 rounded">Ubah</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>