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
  <title>Sobre a Empresa</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<?php include './nav-footer/nav.php'; ?>


  <div class="container">
    <div class="row">
      </div>
  </div>

  <div class="bg-light">
    <div class="container py-5">
      <div class="row h-100 align-items-center py-5">
        <div class="col-lg-6">
          <h1 class="display-4">Sobre Nós</h1>
          <p class="lead text-muted mb-0">FisioVital é uma renomada empresa especializada em serviços de fisioterapia, comprometida em fornecer cuidados de saúde de alta qualidade e ajudar os clientes a alcançarem uma vida plena e saudável. Com uma equipe de profissionais altamente qualificados e uma abordagem centrada no paciente, a FisioVital tem sido uma referência no setor de fisioterapia desde sua fundação.</p></a>
          </p>
        </div>
        <div class="col-lg-6 d-none d-lg-block"><img src="./imagens/clinica.jpg" alt="" class="img-fluid"></div>
      </div>
    </div>
  </div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Nossos Serviços</h2>
        <p class="font-italic text-muted mb-4">Fisioterapia ortopédica: Tratamento de lesões musculoesqueléticas, como entorses, distensões, tendinites e fraturas ósseas.</p>
        <p class="font-italic text-muted mb-4">Fisioterapia neurológica: Reabilitação de pacientes com doenças neurológicas, como acidente vascular cerebral (AVC), lesões medulares e esclerose múltipla. </p>
        <p class="font-italic text-muted mb-4">Fisioterapia esportiva: Prevenção e tratamento de lesões esportivas, além de melhoria do desempenho atlético.</p>
        <p class="font-italic text-muted mb-4">Fisioterapia respiratória: Tratamento de condições respiratórias, como asma, bronquite e fibrose cística.</p>
        <p class="font-italic text-muted mb-4">Fisioterapia geriátrica: Melhoria da qualidade de vida e tratamento de condições comuns em idosos, como artrite, osteoporose e problemas de equilíbrio.</p>
      <a href="produtos.php" class="btn btn-light px-5 rounded-pill shadow-sm">Saiba Mais</a>
      </div>
      <div class="col-lg-6 px-5 mx-auto order-1 order-lg-2"><img src=./imagens/fisioterapia3.avif alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-7 mx-auto"><img src="./imagens/CONSULTORIO.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Nossa História</h2>
        <p class="font-italic text-muted mb-4">A história da FisioVital remonta a 2005, quando a fisioterapeuta Maria Silva, apaixonada pela área de reabilitação e bem-estar, decidiu abrir sua própria clínica de fisioterapia. Com determinação e conhecimento especializado, Maria estabeleceu uma clínica modesta, mas acolhedora, focada em proporcionar um atendimento personalizado e eficaz aos pacientes.
        Ao longo dos anos, a reputação da FisioVital cresceu rapidamente, graças aos resultados positivos obtidos pelos pacientes e ao boca a boca positivo. Com a demanda em constante crescimento, a clínica expandiu suas instalações e recrutou uma equipe de fisioterapeutas altamente capacitados e apaixonados pelo trabalho. Essa equipe talentosa compartilhava da visão de Maria de oferecer serviços excepcionais e atendimento centrado no paciente.
        A FisioVital ganhou destaque na comunidade local devido à abordagem holística adotada, que combina técnicas de fisioterapia tradicional com métodos inovadores de reabilitação. Essa abordagem única permitiu que a clínica atendesse uma ampla gama de condições, desde lesões esportivas até reabilitação pós-operatória e tratamento de condições crônicas. A equipe da FisioVital estava constantemente atualizando suas habilidades e conhecimentos para oferecer os melhores tratamentos disponíveis.</p>
      </div>
    </div>
  </div>
</div>

<?php include './nav-footer/footer.php'; ?>


  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
