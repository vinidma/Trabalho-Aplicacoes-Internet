<?php

require_once '../../banco.php';
require_once '../validacao_admin.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_REQUEST['id'];
}

if (null == $id) {
    header("Location: index.php");
}

if (!empty($_POST)) {
    $nomeErro = null;
    $descricaoErro = null;

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $validacao = true;
    if (empty($nome)) {
        $nomeErro = 'Por favor, digite o nome!';
        $validacao = false;
    }

    if (empty($descricao)) {
        $descricaoErro = 'Por favor, digite a descrição!';
        $validacao = false;
    }

    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE novidades SET nome = ?, descricao = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$nome, $descricao, $id]);
        Banco::desconectar();
        header("Location: novidades_admin.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM novidades WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nome = $data['nome'];
    $descricao = $data['descricao'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Atualizar Novidade</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="mt-4">Atualizar Novidade</h3>
        <form method="post" action="editar_novidades.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao" required><?php echo $descricao; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="novidades_admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
