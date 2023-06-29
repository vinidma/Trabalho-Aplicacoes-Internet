<?php
require_once './../banco.php';

// Acompanha os erros de validação
$nomeErro = null;
$precoErro = null;

// Processa apenas quando houver uma chamada POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validacao = true;
    
    // Verifica se o campo "nome" foi preenchido
    if (!empty($_POST['nome'])) {
        $nome = $_POST['nome'];
    } else {
        $nomeErro = 'Por favor, digite o nome do produto!';
        $validacao = false;
    }

    // Verifica se o campo "preco" foi preenchido
    if (!empty($_POST['preco'])) {
        $preco = $_POST['preco'];
    } else {
        $precoErro = 'Por favor, digite o preço do produto!';
        $validacao = false;
    }

    // Se todos os campos estiverem preenchidos corretamente, realiza o cadastro
    if ($validacao) {
        $pdo = Banco::conectar();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO produtos (nome, preco) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $preco]);
        Banco::desconectar();
        header("Location: index.php");
        exit();
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>

<div class="container">
    <h1>Cadastro de Produtos</h1>
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" class="form-control" id="preco" name="preco" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
</div>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
