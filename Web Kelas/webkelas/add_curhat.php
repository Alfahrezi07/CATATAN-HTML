<!-- // add_curhat.php -->

<?php
session_start();
require_once ('db.php');



$success = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $curhat_text = $_POST['curhat_text'];
    $siswa_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO curhat (curhat_text, siswa_id) VALUES ('$curhat_text', '$siswa_id')";
    if ($koneksi->query($sql) === TRUE) {
        $success = "Curhat baru berhasil dibuat";
        echo "<script>
            setTimeout(() => {
                window.location.href = 'view_curhat.php';
            }, 1000);
            </script>";
    } else {
        $error = "Error: " . $sql . "<br>" . $koneksi->error;
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
                        Halaman Ingin Curhat
                    </h2>
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
                        <div class="py-3">
                            <p class="py-3"><label for="" class="font-bold dark:text-gray-100">Curhat
                                    Text:</label></p>
                            <textarea style="border: 2px solid rgba(0,0,0,.5)" class="text-lg p-3 w-full rounded"
                                name="curhat_text" rows="5"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Tambah Curhat</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>