<?php
require_once 'banco.php';

session_start();

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
  $usuario = $_SESSION['login'];
  $camposDisponiveis = true;
} else {
  $usuario = 'Convidado';
  $camposDisponiveis = false;
}

// Verificar se os dados foram enviados pelo formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Verificar se o usuário está logado
  if ($camposDisponiveis) {
    // Obter os valores enviados pelo formulário
    $servico = $_POST['nome'];
    $email = $_POST['email'];
    $data = $_POST['data'];

    // Inserir os dados no banco de dados
    $db = Banco::conectar();

    // Preparar a consulta SQL
    $query = "INSERT INTO servicos (id, usuario, servico, email, data) VALUES (NULL, ?, ?, ?, ?)";
    $stmt = $db->prepare($query);

    // Executar a consulta com os valores dos parâmetros
    $stmt->execute([$usuario, $servico, $email, $data]);

    Banco::desconectar();
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Lista de Produtos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
</head>

<body class="d-flex flex-column min-vh-100">
  <?php include './nav-footer/nav.php'; ?>
  <div class="container flex-grow-1">
    <h1 class="mt-2">Serviços</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Produto</th>
          <th>Serviço</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $db = Banco::conectar();

        $query = "SELECT * FROM produtos";
        $stmt = $db->query($query);

        while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
          echo "<tr>";
          echo "<td>" . $produto['nome'] . "</td>";
          echo "<td>R$ " . $produto['preco'] . "</td>";
          echo "</tr>";
        }

        Banco::desconectar();
        ?>
      </tbody>
    </table>
    <?php if ($camposDisponiveis): ?>
      <div class="rounded bg-gradient-1 text-dark shadow p-5 text-center mb-5">
        <form method="POST" action="">
          <div class="form-group">
            <label for="servico">Serviço:</label>
            <select class="form-control" id="servico" name="nome">
              <?php
              $db = Banco::conectar();

              $query = "SELECT * FROM produtos";
              $stmt = $db->query($query);

              while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $produto['nome'] . "'>" . $produto['nome'] . "</option>";
              }

              Banco::desconectar();
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" id="data" name="data" required>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
          <br>
      </div>
      <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $camposDisponiveis): ?>
        <p class="alert alert-primary" role="alert">Uma confirmação será enviada para o seu e-mail.</p>
      <?php endif; ?>
      </form>
    <?php else: ?>
      <div class="rounded bg-gradient-1 text-dark shadow p-5 text-center mb-5">
        <p class="mb-4 font-weight-bold text-uppercase">Faça login para selecionar os serviços!</p>
        <p class="font-italic">Você precisa estar logado para acessar esta funcionalidade.</p>
      </div>
    <?php endif; ?>
  </div>
  <br>
  <?php include './nav-footer/footer.php'; ?>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>