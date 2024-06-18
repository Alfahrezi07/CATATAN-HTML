<?php
session_start();
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': false }" x-data="data()" lang="en">

<head>
    <title>Orang Tua</title>
    <?php require_once './views/header.php'; ?>
    <style>
        .njj {
            margin: 0 6px;
        }
    </style>
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        <?php require_once './views/sidebar_orang_tua.php'; ?>
        <div class="flex flex-col flex-1 w-full">
            <?php require_once './views/navbar.php'; ?>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container grid px-6 mx-auto">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Tabel Data Siswa
                    </h2>

                    <!-- With actions -->
                    <!-- <div class="mb-4 text-sm font-semibold text-gray-600 dark:text-gray-300">
                        <div class="flex align-center justify-end">

                            <a class="p-2 rounded bg-purple-600 text-white njj" href="add_siswa.php">Tambah Siswa</a>
                        </div>
                    </div> -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">id</th>
                                        <th class="px-4 py-3">nama</th>
                                        <th class="px-4 py-3">nis</th>
                                        <th class="px-4 py-3">nisn</th>
                                        <th class="px-4 py-3">alamat</th>
                                        <th class="px-4 py-3">tgl_lahir</th>
                                        <th class="px-4 py-3">kelas</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    <?php
                                    require_once "db.php";
                                    $i = 1;
                                    // $sql = "SELECT * FROM siswa WHERE nama='$nama' AND nis='$nis' AND tgl_lahir='$tgl_lahir'";
                                    // $result = $koneksi->query($sql);
                                    
                                    // if ($result->num_rows > 0) {
                                    //     $row = $result->fetch_assoc();
                                    //     
                                    require_once "orang_tua2.php";
                                    ?>
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <?php echo $i; ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $data['nama'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-xs">
                                            <?= $data['nis'] ?>

                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $data['nisn'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $data['alamat'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $data['tgl_lahir'] ?>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <?= $data['kelas'] ?>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center space-x-4 text-sm">
                                                <a href="ubah_siswa.php?id=<?php echo $data['id']; ?>"
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Edit">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                        </path>
                                                    </svg>
                                                </a>
                                                <button
                                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                    aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    // } else {
                                    //     echo "Siswa tidak ditemukan";
                                    // }
                                    
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