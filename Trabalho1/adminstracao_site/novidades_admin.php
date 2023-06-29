<?php
require_once '../banco.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome']) && isset($_POST['descricao'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO novidades (nome, descricao) VALUES (?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute([$nome, $descricao]);
    Banco::desconectar();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $idNovidade = $_POST['excluir'];

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM novidades WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute([$idNovidade]);
    Banco::desconectar();
}

$novidades = array();
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM novidades";
$q = $pdo->query($sql);
$novidades = $q->fetchAll(PDO::FETCH_ASSOC);
Banco::desconectar();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Administração de Novidades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>


<div class="container">
    <h1>Administração de Novidades</h1>
    
    <!-- Formulário para adicionar uma nova novidade -->
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Novidade</button>
    </form>

    <br>

    <!-- Tabela para mostrar as novidades -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ação</th>
                <th></th> <!-- Coluna extra para o botão de leitura -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($novidades as $novidade): ?>
                <tr>
                    <td><?php echo $novidade['id']; ?></td>
                    <td><?php echo $novidade['nome']; ?></td>
                    <td><?php echo $novidade['descricao']; ?></td>
                    <td>
                        <!-- Formulário para excluir uma novidade -->
                        <form method="POST">
                            <input type="hidden" name="excluir" value="<?php echo $novidade['id']; ?>">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    <td>
                        <!-- Botão de leitura -->
                        <form action="read_novidades.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $novidade['id']; ?>">
                            <button type="submit" class="btn btn-primary">Ler Mais</button>
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
