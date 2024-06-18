<!-- // add_catatan_perkembangan.php -->
<?php
session_start();
require_once ('db.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $siswa_id = $_POST['siswa_id'];
    $catatan_text = $_POST['catatan_text'];

    $sql = "INSERT INTO catatan_perkembangan (siswa_id, wali_kelas_id, catatan_text) VALUES ('$siswa_id', '{$_SESSION['id']}', '$catatan_text')";
    if ($koneksi->query($sql) === TRUE) {
        echo "<script>alert('Catatan perkembangan baru berhasil ditambahkan')</script>";
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
                        Tambah Catatan Perkembangan Siswa
                    </h2>
                    <form method="post" action="">
                        <!-- <div>
                            <p><label for="" class="font-bold ">
                            ID: <input type="text" name="id" style="border: 1px solid rgba(0,0,0,.2)" class="text-sm form-input p-3 w-full rounded"><br><br>
                            </label></p>
                        </div> -->
                        <div>
                            <p><label for="" class="font-bold">
                                    Siswa: <select name="siswa_id" id="" style="border: 1px solid rgba(0,0,0,.5)"
                                        class="text-sm p-3 w-full rounded ">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT * FROM siswa;
                                                                        ");
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                                <option value="<?= $data['id'] ?>" class="text-sm"><?= $data['nama']; ?>
                                                </option>
                                        <?php } ?>
                                    </select>
                                </label></p>
                        </div>
                        <!-- <div>
                            <p><label for="" class="font-bold ">
                            Guru ID: <input type="text" name="guru_id" tyle="border: 1px solid rgba(0,0,0,.2)" class="text-sm form-input p-3 w-full rounded"><br>
                            </label></p>
                        </div> -->
                        <div class="py-4">
                            <p><label for="" class="font-bold ">Catatan Text:</label></p>
                            <textarea style="border: 1px solid rgba(0,0,0,.2)"
                                class="text-sm form-input p-3 w-full rounded" name="catatan_text"
                                rows="5"></textarea><br><br><br>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Tambah Catatan Perkembangan
                            Siswa</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>