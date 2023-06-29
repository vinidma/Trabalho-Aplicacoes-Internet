<nav class="navbar navbar-expand-lg navbar-dark bg-custom p-3">
  <style>
    .bg-custom {
      background-color: #61876E;
    }
  </style>
  <div class="container-fluid">
    <div class="d-flex">
      <a class="font-italic navbar-brand fisiovital-brand" href="index.php">
        <img src="./imagens/icone_footer.png" alt="Ícone Footer" class="icone-footer">
        FisioVital
      </a>
    </div>

    <div class="font-italic  flex-grow-0">
      <ul class="navbar-nav ms-auto">
        <?php
        if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
          $usuario = $_SESSION['login'];
          echo '<li class="nav-item"><span class="navbar-text">Bem-vindo, ' . $usuario . ' | <a href="logout.php">Sair</a></span></li>';
        } else {
          echo '<li class="nav-item"><span class="navbar-text">Bem-vindo, Convidado | <a href="login.php">Login</a></span></li>';
        }
        ?>
        <li class="font-italic nav-item">
          <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="produtos.php">Serviços</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="novidades.php">Novidades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2" href="sobre.php">Sobre Nós</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
