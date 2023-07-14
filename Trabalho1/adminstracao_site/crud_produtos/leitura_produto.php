<?php
require_once '../../banco.php';

$id = null;
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
}

if (null == $id) {
    header("Location: ../index_admin.php");
    exit();
} else {
    $pdo = Banco::conectar();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM produtos WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute([$id]);
    $data = $q->fetch(PDO::FETCH_ASSOC);
    Banco::desconectar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Informações do Produto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3 class="text-center">Informações do Produto</h3>
            </div>
            <div class="card-body">
                <div class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label">Nome:</label>
                        <div class="controls form-control">
                            <p><?php echo $data['nome']; ?></p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Preço:</label>
                        <div class="controls form-control">
                            <p>R$ <?php echo $data['preco']; ?></p>
                        </div>
                    </div>

                    <div class="form-actions">
                        <a href="../index_admin.php" type="button" class="btn btn-default">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
