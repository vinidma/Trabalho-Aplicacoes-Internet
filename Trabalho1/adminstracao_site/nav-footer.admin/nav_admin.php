<?php
if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    $usuario = $_SESSION['login'];
    echo '<p class="navbar-text">Bem-vindo, ' . $usuario . ' | <a href="../index.php">Sair</a></p>';
} else {
    echo '<p class="navbar-text">Bem-vindo, Convidado | <a href="login.php">Login</a></p>';
}
?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Minha Loja</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cadastro_admin.php">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="novidades_admin.php">Novidades</a>
            </li>
        </ul>
    </div>
</nav>