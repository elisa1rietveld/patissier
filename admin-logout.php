<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: admin-login.php');
}

session_destroy();
header('Location: admin-login.php');
