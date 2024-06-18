<!-- admin_dashboard.php -->
<?php
session_start();
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
            <?php require_once 'fungsi.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Tabel Data Curhat Siswa
                    </h2>

                    <?php if ($_SESSION['role'] == 'siswa'): ?>
                        <div class="flex text-sm font-semibold mb-4 align-center justify-end">
                            <a class="rounded bg-blue-600 text-white p-2 njj" href="add_curhat.php">Ingin Curhat</a><br>

                        </div>
                    <?php endif; ?>

                    <!-- With actions -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">id</th>
                                        <th class="px-4 py-3">curhat</th>
                                        <th class="px-4 py-3">respon</th>
                                        <th class="px-4 py-3">siswa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    require_once "db.php";
                                    $i = 1;
                                    if ($_SESSION['role'] == 'siswa') {
                                        $query = mysqli_query($koneksi, "SELECT c.curhat_text as 'curhat_text',
                                                                    s.nama as 'siswa',
                                                                    s.id as 'siswa_id',
                                                                    c.id as 'id',
                                                                    c.response_text as 'response_text'
                                                                    FROM 
                                                                    curhat as c 
                                                                    INNER JOIN 
                                                                    siswa as s 
                                                                    ON c.siswa_id = s.id
                                                                    WHERE s.id = {$_SESSION['user']['id']};
                                                                    ");
                                    } else {
                                        $query = mysqli_query($koneksi, "SELECT c.curhat_text as 'curhat_text',
                                                                    s.nama as 'siswa',
                                        s.id as 'siswa_id',
                                        c.id as 'id',
                                                                    c.response_text as 'response_text'
                                                                    FROM 
                                                                    curhat as c 
                                                                    INNER JOIN 
                                                                    siswa as s 
                                                                    ON c.siswa_id = s.id;
                                                                    ");
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <?= $i ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $data['curhat_text'] ?>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <?php if (empty($data['response_text']) && $_SESSION['role'] != 'siswa'): ?>
                                                    <div class="flex text-sm font-semibold mb-4 align-center justify-end">
                                                        <a class="rounded bg-blue-600 text-white p-2 njj"
                                                            href="respon_curhat.php?id=<?= $data['id'] ?>&id_siswa=<?= $data['siswa_id'] ?>">Beri
                                                            Respon</a><br>

                                                    </div> <?php else: ?>
                                                    <?= $data['response_text'] ?>
                                                <?php endif; ?>

                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $data['siswa'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $i++;
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>