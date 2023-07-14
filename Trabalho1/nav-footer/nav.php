<nav class="navbar navbar-expand-lg navbar-dark bg-custom p-3">
  <style>
    .bg-custom {
      background-color: #61876E;
    }
  </style>
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <div class="text-start">
      <?php
      if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
        $usuario = $_SESSION['login'];
        echo '<span class="navbar-text">Bem-vindo, ' . $usuario . ' | <a href="logout.php">Sair</a></span>';
      } else {
        echo '<span class="navbar-text">Bem-vindo, Convidado | <a href="login.php">Login</a></span>';
      }
      ?>
    </div>
    <a class="font-italic navbar-brand fisiovital-brand d-flex align-items-center" href="index.php">
      <img src="./imagens/icone_footer.png" alt="Ícone Footer" class="icone-footer" style="margin-right: 5px;">
      FisioVital
    </a>
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="produtos.php">Serviços</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="novidades.php">Novidades</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sobre.php">Sobre Nós</a>
      </li>
    </ul>
  </div>
</nav>
