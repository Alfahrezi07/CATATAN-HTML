<!-- // add_catatan_khusus.php -->
<?php
session_start();
require_once ('db.php');

if ($_SESSION['role'] != 'guru') {
    header("location: index.php");
    exit;
}

$success = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $siswa_id = $_POST['siswa_id'];
    $catatan_text = $_POST['catatan_text'];

    $sql = "INSERT INTO catatan_khusus (siswa_id, guru_id, catatan_text) VALUES ('$siswa_id', '{$_SESSION['id']}', '$catatan_text')";
    if ($koneksi->query($sql) === TRUE) {
        $success = "Catatan khusus baru berhasil ditambahkan";
        echo "<script>
            setTimeout(() => {
                window.location.href = 'view_catatan_khusus.php';
            }, 1000);
            </script>";
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
                        Tambah Catatan Khusus
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
                        <!-- <div>
                            <p><label for="" class="font-bold ">
                            ID: <input type="text" name="id" style="border: 2px solid rgba(0,0,0,.5)" class="text-lg p-3 w-full rounded"><br><br>
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
                        <div>

                        </div>
                        <div>
                            <p><label for="" class="font-bold ">Catatan Text:</label></p>
                            <textarea style="border: 1px solid rgba(0,0,0,.2)"
                                class="text-sm form-input p-3 w-full rounded" name="catatan_text" rows="5"></textarea>
                        </div>
                        <br>
                        <br>


                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Tambah Catatan Khusus</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>