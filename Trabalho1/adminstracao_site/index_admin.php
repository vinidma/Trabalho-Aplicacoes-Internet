<?php
require_once '../banco.php';

require_once './validacao_admin.php';


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
<body>
<?php include './nav-footer.admin/nav_admin.php'; ?>


<div class="container">
    <h1>Lista de Produtos</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Conecta ao banco de dados
        $db = Banco::conectar();

        // Consulta os produtos
        $query = "SELECT * FROM produtos";
        $stmt = $db->query($query);

        // Exibe os produtos na tabela
        while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $produto['id'] . "</td>";
            echo "<td>" . $produto['nome'] . "</td>";
            echo "<td>R$ " . $produto['preco'] . "</td>";
            echo "<td><a class='btn btn-primary' href='adicionar_carrinho.php?id=" . $produto['id'] . "'>Adicionar ao Carrinho</a></td>";
            echo "<td><a class='btn btn-secondary' href='cadastro_admin.php'>Cadastro</a></td>"; // Botão de Cadastro
            echo "<td><a class='btn btn-secondary' href='novidades_admin.php'>Novidades</a></td>"; // Botão de Novidades
;
        }

        // Desconecta do banco de dados
        Banco::desconectar();
        ?>
        </tbody>
    </table>
</div>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
