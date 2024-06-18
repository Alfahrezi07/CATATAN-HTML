<?php

function cekLogin()
{
    if (!isset($_SESSION['isLogin']) && !$_SESSION['isLogin']) {
        header('Location: index.php');
        exit();
    }
}

function isSiswa()
{
    return $_SESSION['role'] == 'siswa';
}

function isAdmin()
{
    return $_SESSION['role'] == 'admin';
}

function isWaliKelas()
{
    return $_SESSION['role'] == 'wali_kelas';
}

function isGuru()
{
    return $_SESSION['role'] == 'guru';
}
function isOrangTua()
{
    return $_SESSION['role'] == 'orang_tua';
}

