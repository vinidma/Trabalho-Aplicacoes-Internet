<?php
session_start();

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] === true) {
    $usuario = $_SESSION['login'];
} else {
    $usuario = 'Convidado'; 
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Bem-vindo à Loja</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php include './nav-footer/nav.php'; ?>

<div class="container py-5">
    <header class="text-center">
        <h1 class="display-4 mb-4">Novidades!</h1>
        <p class="font-italic text-muted mb-0">Estamos muito felizes que você está aqui!</p>
        <p class="font-italic text-muted mb-0">Nesta página você irá conseguir visualizar todas as novidades da FisioVital e todas atualizações estarão disponíveis nesta página.</p>
    </header>

    <div class="py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <?php
                include 'banco.php';

                $conn = Banco::conectar();

                $sql = "SELECT id, nome, descricao FROM novidades";
                $result = $conn->query($sql);

                if ($result->rowCount() > 0) {
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="rounded bg-gradient-1 text-dark shadow p-5 text-center mb-5">';
                        echo '<p class="mb-4 font-weight-bold text-uppercase">Chegando em Breve!</p>';
                        echo '<h2 class="font-italic text-muted mb-4">' . $row["nome"] . '</h2>';
                        echo '<p class="font-italic text-muted mb-4">' . $row["descricao"] . '</p>';
                        echo '<div id="clock-b" class="countdown-circles d-flex flex-wrap justify-content-center pt-4"></div>';
                        echo '</div>';
                    }
                } else {
                    echo "Não foram encontrados registros.";
                }

                Banco::desconectar();
                ?>

            </div>
        </div>
    </div>
</div>

<?php include './nav-footer/footer.php'; ?>
</body>
</html>
