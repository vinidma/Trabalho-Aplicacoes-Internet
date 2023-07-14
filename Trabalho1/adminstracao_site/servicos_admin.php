<?php
require_once '../banco.php';
require_once './validacao_admin.php';

$logins = array();
$pdo = Banco::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "SELECT * FROM servicos";
$q = $pdo->query($sql);
$servicos = $q->fetchAll(PDO::FETCH_ASSOC);
Banco::desconectar();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Serviços</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php include './nav-footer.admin/nav_admin.php'; ?>

<div class="container">
    <h1>Lista de Serviços</h1>

    <table class="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Usuário</th>
            <th>Serviço</th>
            <th>Email</th>
            <th>Data</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($servicos as $servico): ?>
            <tr>
                <td><?php echo $servico['id']; ?></td>
                <td><?php echo $servico['usuario']; ?></td>
                <td><?php echo $servico['servico']; ?></td>
                <td><?php echo $servico['email']; ?></td>
                <td><?php echo $servico['data']; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
