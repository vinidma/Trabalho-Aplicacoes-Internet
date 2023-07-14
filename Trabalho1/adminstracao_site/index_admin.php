<?php
require_once '../banco.php';
require_once './validacao_admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['preco'])) {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    cadastrarProduto($nome, $preco);
}

function excluirProduto($id) {
    $db = Banco::conectar();
    $sql = "DELETE FROM produtos";
    $stmt = $db->prepare($sql);
    $stmt->execute([$id]);
    Banco::desconectar();
}

function cadastrarProduto($nome, $preco) {
    $db = Banco::conectar();
    $sql = "INSERT INTO produtos (nome, preco) VALUES (?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$nome, $preco]);
    Banco::desconectar();
}

$logins = array();
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM produtos";
$q = $pdo->query($sql);
$produtos = $q->fetchAll(PDO::FETCH_ASSOC);
Banco::desconectar();

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
    <h4>Adicione serviço</h4>
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" class="form-control" id="preco" name="preco" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Produto</button>
    </form>

    <br>

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
        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td>R$ <?php echo $produto['preco']; ?></td>
                <td>
                    <a class="btn btn-primary" href="./crud_produtos/leitura_produto.php?id=<?php echo $produto['id']; ?>">Ler</a>
                </td>
                <td>
                    <a class="btn btn-warning" href="./crud_produtos/editar_produtos.php?id=<?php echo $produto['id']; ?>">Editar</a>
                </td>
                <td>
                    <form method="POST" action="./crud_produtos/delete_produtos.php">
                        <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
