<?php
require_once 'banco.php';


// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obter os dados do formulário
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $cpf = $_POST['cpf'];

  // Conectar ao banco de dados
  $db = Banco::conectar();

  // Preparar e executar a consulta SQL para inserir o novo registro
  $sql = "INSERT INTO login (login, senha, nome, email, cpf) VALUES (?, ?, ?, ?, ?)";
  $stmt = $db->prepare($sql);
  $stmt->execute([$login, $senha, $nome, $email, $cpf]);

  if ($stmt->rowCount() > 0) {
    echo "Registro criado com sucesso.";
  } else {
    echo "Erro ao criar o registro.";
  }

  // Desconectar do banco de dados
  Banco::desconectar();
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

<section class="vh-100" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="font-italic text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Cadastrar</p>


                <form class="font-italic text-muted mb-4" class="mx-1 mx-md-4" method="POST" action="cadastro.php">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="login" />
                      <label class="form-label" for="form3Example1c">Login</label>
                    </div>
                  </div>


                <form class="font-italic text-muted mb-4" class="mx-1 mx-md-4" method="POST" action="cadastro.php">
                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" id="form3Example1c" class="form-control" name="nome" />
                      <label class="form-label" for="form3Example1c">Seu Nome</label>
                    </div>
                  </div>

                  

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" id="form3Example3c" class="form-control" name="email" />
                      <label class="form-label" for="form3Example3c">Email</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4cd" class="form-control" name="senha" />
                      <label class="form-label" for="form3Example4cd">Senha</label>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" id="form3Example4c" class="form-control" name="cpf" />
                      <label class="form-label" for="form3Example4c">CPF</label>
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
                  </div>

                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="./imagens/fisioterapia_cadastro.png"
                  class="img-fluid" alt="Sample image" style="border-radius: 25px;">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include './nav-footer/footer.php'; ?>

</body>
</html>
