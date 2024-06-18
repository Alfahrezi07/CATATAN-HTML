<!DOCTYPE html>
<html :class="{ 'theme-dark': false }" x-data="data()" lang="en">

<head>
    <title>Dashboard admin</title>
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
        $nip = $_POST['nip'];
        $query = mysqli_query($koneksi, "UPDATE guru SET nip='$nip', nama='$nama' WHERE id=$id");
        if ($query) {
            echo "<script>
            alert('Ubah data Berhasil')
            window.location.href='view_guru.php'
            </script>";
        } else {
            echo '<script>alert("Ubahh data gagal")</script>';
        }
        exit;
    }

    $query = mysqli_query($koneksi, "SELECT * FROM guru WHERE id=$id");
    $data = mysqli_fetch_array($query);
    ?>


    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php require_once './views/sidebar.php'; ?>
        <div class="flex flex-col flex-1 w-full">
            <?php require_once './views/navbar.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Halaman ubah Guru
                    </h2>
                    <form method="post" action="">

                        <div>
                            <p><label for="" class="font-bold ">
                                    Nama: <input type="text" name="nama" style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm p-3 form-input w-full rounded"
                                        value="<?php echo $data['nama']; ?>"><br><br>
                                </label></p>
                        </div>
                        <div>
                            <p><label for="" class="font-bold ">
                                    Nip: <input type="text" name="nip" style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm p-3 form-input w-full rounded"
                                        value="<?php echo $data['nip']; ?>"><br><br>
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