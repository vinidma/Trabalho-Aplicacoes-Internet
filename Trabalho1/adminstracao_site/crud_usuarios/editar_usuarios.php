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

    $loginErro = null;
    $senhaErro = null;
    $nomeErro = null;
    $emailErro = null;
    $cpfErro = null;

    $login = $_POST['login'];
    $senha = $_POST['senha'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    // Validação
    $validacao = true;
    if (empty($login)) {
        $loginErro = 'Por favor, digite o login!';
        $validacao = false;
    }

    if (empty($senha)) {
        $senhaErro = 'Por favor, digite a senha!';
        $validacao = false;
    }

    if (empty($nome)) {
        $nomeErro = 'Por favor, digite o nome!';
        $validacao = false;
    }

    if (empty($email)) {
        $emailErro = 'Por favor, digite o email!';
        $validacao = false;
    }

    if (empty($cpf)) {
        $cpfErro = 'Por favor, digite o CPF!';
        $validacao = false;
    }

    // Atualizar os dados
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE login SET login = ?, senha = ?, nome = ?, email = ?, cpf = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute([$login, $senha, $nome, $email, $cpf, $id]);
        Banco::desconectar();
        header("Location: ../index_admin.php");
    }
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM login WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    $data = $q->fetch(PDO::FETCH_ASSOC);
    $login = $data['login'];
    $senha = $data['senha'];
    $nome = $data['nome'];
    $email = $data['email'];
    $cpf = $data['cpf'];
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Atualizar Usuário</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h3 class="mt-4">Atualizar Usuário</h3>
        <form method="post" action="editar_usuarios.php?id=<?php echo $id; ?>">
            <div class="form-group">
                <label for="login">Login:</label>
                <input type="text" class="form-control" id="login" name="login" value="<?php echo $login; ?>" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" value="<?php echo $senha; ?>" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="nome" class="form-control" id="nome" name="nome" value="<?php echo $nome; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label>
                <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $cpf; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="../index_admin.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
