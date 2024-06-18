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

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Tabel Data Ide Siswa
                    </h2>

                    <?php if ($_SESSION['role'] == 'siswa'): ?>
                        <div class="flex text-sm font-semibold mb-4 align-center justify-end">

                            <a class="p-2 rounded bg-purple-600 text-white njj" href="add_ide.php">Berikan
                                Idemu!</a><br>
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
                                        <th class="px-4 py-3">Ide</th>
                                        <th class="px-4 py-3">respon</th>
                                        <th class="px-4 py-3">siswa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    require_once "db.php";
                                    $i = 1;

                                    if ($_SESSION['role'] == 'siswa') {
                                        $query = mysqli_query($koneksi, "SELECT i.ide_text as 'ide_text',
                                                                    s.nama as 'siswa',
                                                                    s.id as 'siswa_id',
                                                                    i.id as 'id',
                                                                    i.response_text as 'response_text'
                                                                    FROM 
                                                                    ide as i 
                                                                    INNER JOIN 
                                                                    siswa as s 
                                                                    ON i.siswa_id = s.id
                                                                    WHERE i.siswa_id = {$_SESSION['user']['id']};
                                                                    ");
                                    } else {
                                        $query = mysqli_query($koneksi, "SELECT i.ide_text as 'ide_text',
                                                                    s.nama as 'siswa',
                                                                    s.id as 'siswa_id',
                                                                    i.id as 'id',
                                                                    i.response_text as 'response_text'
                                                                    FROM 
                                                                    ide as i 
                                                                    INNER JOIN 
                                                                    siswa as s 
                                                                    ON i.siswa_id = s.id
                                                                   ;
                                                                    ");
                                    }
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <?= $i ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $data['ide_text'] ?>
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <?php if (empty($data['response_text']) && $_SESSION['role'] != 'siswa'): ?>
                                                    <div class="flex text-sm font-semibold mb-4 align-center justify-end">
                                                        <a class="rounded bg-blue-600 text-white p-2 njj"
                                                            href="respon_ide.php?id=<?= $data['id'] ?>&id_siswa=<?= $data['siswa_id'] ?>">Beri
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