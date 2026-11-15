<?php
    session_start();
    if (!isset($_SESSION['proprietarioId'])) {
        header('Location:login.php');
        die();
    }
?>