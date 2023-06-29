<?php
session_start();

// Verifica se o usuário está autenticado como admin
if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true || $_SESSION['login'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}
?>
