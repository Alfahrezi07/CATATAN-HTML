<!-- lihat_siswa.php -->
<?php
require_once ('db.php');
session_start();
$_SESSION['role'] = 'orang_tua';
$id_siswa = (int) $_GET['id'];

if (!isset($id_siswa)) {
    echo "<script>alert('data siswa tidak valid'); window.location.href= 'dashboard.php'</script>";
}

$sql = "SELECT s.*,k.nama as 'kelas' FROM siswa s INNER JOIN kelas k ON s.id_kelas = k.id WHERE s.id = {$id_siswa}";

if ($koneksi->query($sql)->num_rows == 0) {
    echo "<script>alert('data siswa tidak valid'); window.location.href= 'dashboard.php'</script>";
}

$data = $koneksi->query($sql)->fetch_assoc();

?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': false }" x-data="data()" lang="en">

<head>
    <title>Orang Tua Siswa</title>
    <?php require_once './views/header.php';
    // require_once('orang_tua2.php');
    ?>
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
                        Lihat Siswa
                    </h2>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xl font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3" colspan="2">Data Siswa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">Nama</td>
                                        <td class="px-4 py-3 text-sm"><?= $data['nama'] ?></td>
                                    </tr>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">Nis</td>
                                        <td class="px-4 py-3 text-sm"><?= $data['nis'] ?></td>
                                    </tr>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">Nisn</td>
                                        <td class="px-4 py-3 text-sm"><?= $data['nisn'] ?></td>
                                    </tr>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">Alamat</td>
                                        <td class="px-4 py-3 text-sm"><?= $data['alamat'] ?></td>
                                    </tr>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">Tanggal Lahir</td>
                                        <td class="px-4 py-3 text-sm"><?= $data['tgl_lahir'] ?></td>
                                    </tr>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3 text-sm">Kelas</td>
                                        <td class="px-4 py-3 text-sm"><?= $data['kelas'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="py-3">

                        <hr>
                        <hr>
                        <hr>
                    </div>
                    <div class="py-4">
                        <!-- <button type="submit" name="submit" class="bg-red-600 text-white p-2 rounded">
                            <a href="perkembangan_siswa.php?id_siswa=<?= $data['id'] ?>">Lihat Perkembangan &
                                Permasalahan Siswa</a>
                        </button> -->
                    </div>

                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xl font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3" colspan="2">Perkembangan & Permasalahan Siswa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    require_once "db.php";
                                    $query = mysqli_query($koneksi, "SELECT g.nama as 'guru', c.catatan_text as 'catatan' FROM catatan_perkembangan as c INNER JOIN siswa as s ON c.siswa_id = s.id INNER JOIN guru as g ON c.wali_kelas_id = g.id WHERE c.siswa_id = {$data['id']}");
                                    while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm">
                                                <?= $data['guru'] ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?= $data['catatan'] ?>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>

                    <div class="py-4">

                        <button type="submit" name="submit" class="bg-blue-600 text-white p-2 rounded">
                            <a href="dashboard.php">Kembali</a>
                        </button>
                    </div>




                </div>
            </main>
        </div>
    </div>


</body>

</html>