<!-- db.php -->

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webkelas";

$koneksi = new mysqli($servername, $username, $password, $dbname);

// if ($koneksi) {
//     echo "<br> koneksi aman <br>";
// } else {
//     echo "error, tidak bisa koneksi ke database";
// }

?>