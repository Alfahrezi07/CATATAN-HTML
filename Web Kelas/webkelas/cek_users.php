<?php

$role = isset($_SESSION['isLogin']) ? true : false;

if (!$role)
    header('Location: index.php');
