<?php
session_start();
require_once 'banco.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login']) && isset($_POST['senha'])) {
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $db = Banco::conectar();
        $query = "SELECT * FROM login WHERE login = :login AND senha = :senha";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $_SESSION['autenticado'] = true;
            $_SESSION['login'] = $login;

            if ($login === 'admin' && $senha === 'senha123') {
                header("Location: ./adminstracao_site/index_admin.php");
                exit();
            } else {
                header("Location: index.php");
                exit();
            }
        } else {
            $erro = "Login ou senha incorretos";
        }

        Banco::desconectar();
    } else {
        $erro = "Por favor, preencha todos os campos";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">

</head>
<body class="bg-light">
<?php include './nav-footer/nav.php'; ?>


<section class="vh-100 bg-light" class="bg-light">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-flex align-items-end">
              <img src="./imagens/imagem.jpg" alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height: 100%;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">FisioVital</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Entre na sua conta</h5>

                  <div class="form-outline mb-4">
                    <label class="form-label font-italic" for="login">Login</label>
                    <input type="text" id="login" class="form-control form-control-lg" name="login" placeholder="Digite o seu login" required>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label font-italic" for="senha">Senha</label>
                    <input type="password" id="senha" class="form-control form-control-lg" name="senha" placeholder="Digite a sua senha" required>
                  </div>

                  <div class="alert alert-danger <?php if (!isset($erro)) echo 'd-none'; ?>" role="alert">
                      <?php echo isset($erro) ? $erro : ''; ?>
                  </div>

                  
                  <div class="pt-1 mb-4">
                    <button  type="submit" class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                  </div>

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Não é cadastrado? <a href="cadastro.php"
                      style="color: #393f81;">Se registre aqui!</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include './nav-footer/footer.php'; ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
