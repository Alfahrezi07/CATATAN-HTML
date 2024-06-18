<!-- // add_rating_guru.php -->

<?php
session_start();
require_once ('db.php');

if ($_SESSION['role'] != 'siswa') {
    header("Location: index.php");
    exit;
}
$success = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $siswa_id = $_SESSION['user']['id'];
    $guru_id = $_POST['guru_id'];
    $rating = $_POST['rating'];

    $sql = "SELECT id FROM rating_guru WHERE guru_id = '$guru_id' AND siswa_id = $siswa_id";
    if ($koneksi->query($sql)->num_rows > 0) {
        $error = "Anda Sudah Membuat Rating";
    } else {
        $sql = "INSERT INTO rating_guru (siswa_id, guru_id, rating) VALUES ( '$siswa_id', '$guru_id', '$rating')";
        if ($koneksi->query($sql) === TRUE) {
            $success = "Rating baru berhasil dibuat";
        } else {
            $error = "Anda Sudah Membuat Rating</script>";
        }
    }
}


?>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Tambah Rating Guru</title>
</head>
<body>
    <form method="post" action="">
        ID: <input type="text" name="id"><br>
        Guru ID: <input type="text" name="guru_id"><br>
        Rating: <input type="number" name="rating" min="1" max="5"><br>
        <input type="submit" value="Tambah Rating">
    </form>
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
                        Berikan Rating Guru
                    </h2>
                    <?php if (!empty($success)): ?>
                        <div class="alert success mb-4 rounded">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Sukses!</strong> <?= $success ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($error)): ?>
                        <div class="alert error mb-4 rounded">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Gagal!</strong> <?= $error ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="">

                        <div>
                            <p><label for="" class="font-bold dark:text-gray-100">
                                    Guru: <select name="guru_id" id="" style="border: 1px solid rgba(0,0,0,.5)"
                                        class="text-sm p-3 w-full rounded ">
                                        <?php
                                        $query = mysqli_query($koneksi, "SELECT *
                                                                        FROM guru
                                                                        ");
                                        while ($data = mysqli_fetch_array($query)) {
                                            ?>
                                            <option value="<?= $data['id'] ?>" class="dark:text-blue-700 text-sm">
                                                <?= $data['nama']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </label></p>
                        </div>
                        <div class="py-4">
                            <p><label for="" class="font-bold dark:text-gray-100">
                                    Rating: <input type="number" name="rating" min="1" max="5"
                                        style="border: 1px solid rgba(0,0,0,.2)"
                                        class="text-sm p-3 form-input w-full rounded"><br><br><br>
                                </label></p>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">
                            Tambah Rating </button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>