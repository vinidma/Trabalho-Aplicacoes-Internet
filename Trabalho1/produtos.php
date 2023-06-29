<?php
require_once 'banco.php';

session_start();

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    $usuario = $_SESSION['login'];
} else {
    $usuario = 'Convidado'; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    
    cadastrarProduto($nome, $preco);

}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Lista de Produtos</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
</head>
<body class=" mb-4 d-flex flex-column min-vh-100">
<?php include './nav-footer/nav.php'; ?>
  <div class="container">
    <h1 class="mt-2">Serviços</h1>
    <table  class="table">
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
            echo "<td>".$produto['nome']."</td>";
            echo "<td>R$ ".$produto['preco']."</td>";
            echo "</tr>";
          }

          Banco::desconectar();
        ?>
      </tbody>
    </table>
    <form method="POST" action="">
      <div class="form-group">
        <label for="servico">Serviço:</label>
        <select class="form-control" id="servico" name="nome">
          <?php
          $db = Banco::conectar();

          $query = "SELECT * FROM produtos";
          $stmt = $db->query($query);

          while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value='".$produto['nome']."'>".$produto['nome']."</option>";
          }

          Banco::desconectar();
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="telefone">Número de Telefone:</label>
        <input type="tel" class="form-control" id="telefone" name="telefone" required>
      </div>
      <button  type="button" class="btn btn-primary">Enviar</button>
    </form>

  </div>
  

  <footer class="mt-auto py-3">
    <?php include './nav-footer/footer.php'; ?>
  </footer>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
