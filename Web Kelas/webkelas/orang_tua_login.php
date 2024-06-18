<?php
session_start();
$_SESSION['role'] = 'orang_tua';
$_SESSION['isLogin'] = true;


header('Location: dashboard.php');
exit();