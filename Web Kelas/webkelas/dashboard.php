<!-- admin_dashboard.php -->
<?php
session_start();
require_once ('cek_users.php');

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': false }" x-data="data()" lang="en">

<head>
    <title>Dashboard Admin</title>
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
            <?php require_once './cek_users.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <?php if (isOrangTua()): ?>
                    <div class="container grid px-6 mx-auto">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Orang Tua Siswa
                        </h2>
                        <form method="post" action="orang_tua.php">
                            <div>
                                <p><label for="" class="font-bold ">
                                        NIS: <input type="text" name="nis" style="border: 1px solid rgba(0,0,0,.2)"
                                            class="text-sm form-input p-3 dark:text-gray-200 text--700 w-full rounded"><br><br>
                                    </label></p>
                            </div>
                            <div>
                                <p><label for="" class="font-bold ">
                                        Tanggal Lahir: <input type="date" name="tgl_lahir"
                                            style="border: 1px solid rgba(0,0,0,.2)"
                                            class="text-sm form-input p-3 dark:text-gray-200 text--700 w-full rounded"><br><br><br>
                                    </label></p>
                            </div>


                            <button type="submit" name="submit" class="bg-blue-600 text-white p-2 rounded">
                                Lihat Siswa
                            </button>

                        </form>

                    </div>
                <?php else: ?>
                    <div class="container grid px-6 mx-auto">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            <?= $_SESSION['role'] ?>
                        </h2>
                    </div>
                <?php endif; ?>

            </main>
        </div>
    </div>
</body>

</html>