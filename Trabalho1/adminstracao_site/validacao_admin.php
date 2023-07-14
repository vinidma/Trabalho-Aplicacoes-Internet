<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true || $_SESSION['login'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if (isset($_SESSION['ultima_interacao'])) {
    $tempo_inativo = time() - $_SESSION['ultima_interacao'];
    if ($tempo_inativo > 120) {
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
    }
}

// Atualizar o tempo da última interação
$_SESSION['ultima_interacao'] = time();
?>

