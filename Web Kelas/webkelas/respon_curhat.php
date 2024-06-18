<?php
session_start();
require_once ('db.php');

$id_siswa = (int) $_GET['id_siswa'];
$id = (int) $_GET['id'];


if (!isset($id_siswa)) {
    echo "<script>alert('data siswa tidak valid'); window.location.href= 'view_curhat.php'</script>";
    exit;
}

$sql = "SELECT id FROM curhat WHERE siswa_id = {$id_siswa}";

if ($koneksi->query($sql)->num_rows == 0) {
    echo "<script>alert('data siswa tidak valid'); window.location.href= 'view_curhat.php'</script>";
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response_text = $_POST['response_text'];

    $sql = "UPDATE curhat SET response_text='$response_text' WHERE siswa_id='$id_siswa' AND id='$id'";
    if ($koneksi->query($sql) === TRUE) {
        header('Location: view_curhat.php');
    } else {
        header('Location: view_curhat.php');
    }
    exit;
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
                        Beri Respon Curhat
                    </h2>
                    <form method="post" action="">
                        <div ">
                            <p><label for="" class=" font-bold ">Respon Text:</label></p>
                            <textarea style=" border: 1px solid rgba(0,0,0,.2)"
                            class="text-sm form-input p-3 w-full rounded" name="response_text" rows="5"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Beri Respon</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>