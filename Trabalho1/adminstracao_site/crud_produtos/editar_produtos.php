<?php

require '../../banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {

    $nomeErro = null;
    $precoErro = null;

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];

    // Validação
    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor, digite o nome!';
        $validacao = false;
    }

    if (empty($preco)) {
        $precoErro = 'Por favor, digite o preço!';
        $validacao = false;
    }

    // Atualizar os dados
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE produtos SET nome = ?, preco = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$nome, $preco, $id]);
        Banco::desconectar();
        header("Location: ../index_admin.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $preco = $data['preco'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Atualizar Produto</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="mt-4">Atualizar Produto</h3>
        <form method="post" action="editar_produtos.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="number" class="form-control" id="preco" name="preco" step="0.01" value="<?php echo $preco; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="../index_admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
