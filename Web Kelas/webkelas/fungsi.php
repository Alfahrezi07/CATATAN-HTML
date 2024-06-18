<?php
function hakAksesIzin(string $currentRole)
{
    $validRole = ['siswa', 'admin', 'wali_kelas', 'guru', 'orang_tua'];

    // Check if all roles are valid and match the session role
    foreach ($validRole as $role) {
        if ($role == $currentRole)
            return true;
    }

}

