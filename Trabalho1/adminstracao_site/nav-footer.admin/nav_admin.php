<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Minha Loja</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/trabalho1/adminstracao_site/index_admin.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/trabalho1/adminstracao_site/crud_novidades/novidades_admin.php">Novidades</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/trabalho1/adminstracao_site/crud_usuarios/login_admin.php">Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/trabalho1/adminstracao_site/servicos_admin.php">Serviço</a>
            </li>
        </ul>
    </div>
    <span class="navbar-text">
        <?php
        if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
            $usuario = $_SESSION['login'];
            echo 'Bem-vindo, ' . $usuario . ' | <a href="/trabalho1/index.php">Sair</a>';
        } else {
            echo 'Bem-vindo, Convidado | <a href="/trabalho1/administracao_site/crud_usuarios/login_admin.php">Login</a>';
        }
        ?>
    </span>
</nav>