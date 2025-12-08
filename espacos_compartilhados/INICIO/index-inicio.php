<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Espaços Compartilhados - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/index-inicio.css">
</head>
<body>
  <div class="header-section position-relative">
    <a href="../index.php" class="back-btn">
      <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
    <div class="container text-center">
      <h1 class="page-title">Dashboard</h1>
      <p class="page-subtitle">Escolha uma opção para gerenciar o sistema</p>
    </div>
  </div>

  <div class="container container-custom">
    <div class="row g-4">
      <div class="col-lg-4 col-md-6">
        <div class="dashboard-card position-relative">
          <span class="stats-badge text-primary">
            <i class="fas fa-chart-line me-1"></i>Gerenciar
          </span>
          <div class="card-header-custom text-center">
            <div class="icon-wrapper icon-primary">
              <i class="fas fa-users"></i>
            </div>
            <h2 class="card-title-custom">Usuários</h2>
            <p class="card-description">
              Gerencie todos os usuários cadastrados no sistema. Adicione, edite ou remova pessoas com facilidade.
            </p>
          </div>
          <div class="card-body text-center pb-4">
            <a href="../USUARIO/usuario-index.php" class="btn btn-primary btn-custom">
              <i class="fas fa-user-cog"></i>Acessar
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="dashboard-card position-relative">
          <span class="stats-badge text-success">
            <i class="fas fa-chart-line me-1"></i>Gerenciar
          </span>
          <div class="card-header-custom text-center">
            <div class="icon-wrapper icon-success">
              <i class="fas fa-building"></i>
            </div>
            <h2 class="card-title-custom">Espaços</h2>
            <p class="card-description">
              Controle todos os espaços disponíveis. Cadastre salas, ambientes e áreas para reserva.
            </p>
          </div>
          <div class="card-body text-center pb-4">
            <a href="../ESPACO/espaco-index.php" class="btn btn-success btn-custom">
              <i class="fas fa-door-open"></i>Acessar
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-6">
        <div class="dashboard-card position-relative">
          <span class="stats-badge text-secondary">
            <i class="fas fa-chart-line me-1"></i>Gerenciar
          </span>
          <div class="card-header-custom text-center">
            <div class="icon-wrapper icon-secondary">
              <i class="fas fa-calendar-check"></i>
            </div>
            <h2 class="card-title-custom">Reservas</h2>
            <p class="card-description">
              Administre todas as reservas de espaços. Agende, visualize e controle os agendamentos.
            </p>
          </div>
          <div class="card-body text-center pb-4">
            <a href="../RESERVA/reserva-index.php" class="btn btn-secondary btn-custom">
              <i class="fas fa-calendar-alt"></i>Acessar
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-section">
    <div class="container">
      <p class="mb-0">
        <i class="fas fa-building me-2"></i>
        Sistema de Espaços Compartilhados - Desenvolvido por Maria Helena</i>
      </p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>