<?php

require_once '../../banco.php';
require_once '../validacao_admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO login (login, senha, nome, email, cpf) VALUES (?, ?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    $q->execute([$login, $senha, $nome, $email, $cpf]);
    Banco::desconectar();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $idLogin = $_POST['excluir'];

    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM login WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute([$idLogin]);
    Banco::desconectar();
}

$logins = array();
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM login";
$q = $pdo->query($sql);
$logins = $q->fetchAll(PDO::FETCH_ASSOC);
Banco::desconectar();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Administração de Logins</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<?php include '../nav-footer.admin/nav_admin.php'; ?>


<div class="container">
    <h1>Administração de Logins</h1>

    <!-- Formulário para adicionar um novo usuário -->
    <form method="POST">
        <div class="form-group">
            <label for="login">Login:</label>
            <input type="text" class="form-control" id="login" name="login" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="cpf">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Usuário</button>
    </form>

    <br>

    <!-- Tabela para mostrar os usuários -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Senha</th>
                <th>Nome</th>
                <th>Email</th>
                <th>CPF</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logins as $login): ?>
                <tr>
                    <td><?php echo $login['id']; ?></td>
                    <td><?php echo $login['login']; ?></td>
                    <td><?php echo $login['senha']; ?></td>
                    <td><?php echo $login['nome']; ?></td>
                    <td><?php echo $login['email']; ?></td>
                    <td><?php echo $login['cpf']; ?></td>
                    <td>
                        <!-- Formulário para excluir um usuário -->
                        <form method="POST">
                            <input type="hidden" name="excluir" value="<?php echo $login['id']; ?>">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                    <td>
                        <!-- Botão de leitura -->
                        <form action="leitura_login.php" method="GET">
                            <input type="hidden" name="id" value="<?php echo $login['id']; ?>">
                            <button type="submit" class="btn btn-primary">Ler Mais</button>
                        </form>
                    </td>
                    <td>
                        <!-- Botão de edição -->
                        <a class="btn btn-warning" href="editar_usuarios.php?id=<?php echo $login['id']; ?>">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
