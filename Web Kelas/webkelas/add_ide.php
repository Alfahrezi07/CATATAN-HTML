<!-- // add_ide.php -->

<?php
session_start();
require_once ('db.php');

if ($_SESSION['role'] != 'siswa') {
    header("location: index.php");
    exit;
}
$success = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ide_text = $_POST['ide_text'];
    $siswa_id = $_SESSION['user']['id'];
    // Menganggap username adalah siswa_id

    $sql = "INSERT INTO ide (ide_text, siswa_id) VALUES ('$ide_text', '$siswa_id')";
    if ($koneksi->query($sql) === TRUE) {
        $success = "Ide baru berhasil dibuat";
        echo "<script>
            setTimeout(() => {
                window.location.href = 'view_ide.php';
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
                        Halaman Berikan Ide
                    </h2>
                    <?php if (!empty($success)): ?>
                        <div class="alert success mb-4 rounded">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                            <strong>Sukses!</strong> <?= $success ?>
                        </div>
                    <?php endif; ?>
                    <form method="post" action="">
                        <div class="py-4">
                            <p class="py-4"><label for="" class="font-bold dark:text-gray-100 ">Ide Text:</label></p>
                            <textarea style="border: 1px solid rgba(0,0,0,.2)"
                                class="text-sm form-input p-3 w-full rounded" name="ide_text" rows="5"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white p-2 rounded">Lampirkan Ide</button>
                    </form>

                </div>
            </main>
        </div>
    </div>


</body>

</html>