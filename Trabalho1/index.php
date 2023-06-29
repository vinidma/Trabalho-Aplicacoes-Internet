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
  <link style="border-radius: 25px;" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php include './nav-footer/nav.php'; ?>

<div class="bg-light">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4">Bem-Vindo a FisioVital!</h1>
        <p class="lead text-muted mb-0">Aqui você irá encontrar os melhores serviços para fisioterapia.</p>
        <p class="lead text-muted"><a href="sobre.php" class="text-muted"> 
          <u>Veja mais sobre nossos serviços aqui</u></a>
        </p>
      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="./imagens/img_index.png" alt="" class="img-fluid"></div>
    </div>
  </div>
</div>

<section class="my-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 d-flex flex-column align-items-center">
        <img src="./imagens/icone_index1.png" alt="Serviço 1">
        <div class="text-center">
          <h3>Fisioterapia com os Melhores Profissionais</h3>
          <p>Tratamentos personalizados para reabilitação, lesões esportivas, dor crônica e mais. Agende sua consulta e recupere sua saúde e qualidade de vida.</p>
        </div>
      </div>
      <div class="col-md-4 d-flex flex-column align-items-center">
        <img src="./imagens/icone_index2.png" alt="Serviço 2">
        <div class="text-center">
          <h3>Clínica de Fisioterapia com horários flexíveis</h3>
          <p>Agende sua consulta com os melhores horários e desfrute dos melhores cuidados com nossos especialistas. Sua saúde e bem-estar é sempre nossa prioridade.</p>
        </div>
      </div>
      <div class="col-md-4 d-flex flex-column align-items-center">
        <img src="./imagens/icone_index3.png" alt="Serviço 3">
        <div class="text-center">
          <h3>Equipamentos Modernos</h3>
          <p>Investimos em equipamentos modernos e tecnologicamente avançados, que auxiliam no diagnóstico preciso e no tratamento eficiente dos nossos pacientes. Isso nos permite oferecer terapias inovadoras e resultados mais rápidos e efetivos.</p>
        </div>
      </div>
    </div>
  </div>
</section>



<div class="mb-5"></div> <!-- Espaço adicional entre a seção e o footer -->

<?php include './nav-footer/footer.php'; ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
