<?php
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visualizar Reserva</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/reserva-view.css">
</head>
<body>
  <div class="header-section position-relative">
    <a href="../RESERVA/reserva-index.php" class="back-btn">
      <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
    <div class="container text-center">
      <h1 class="page-title">Visualizar Reserva</h1>
      <p class="page-subtitle">Detalhes completos da reserva cadastrada</p>
    </div>
  </div>

  <div class="container container-custom mt-5">
    <div class="view-section">
      <?php
        if(isset($_GET['id_reserva'])){
          $reserva_id = mysqli_real_escape_string($conexao, $_GET['id_reserva']);
          $sql = "SELECT reserva.*, usuario.nome_usuario, espaco.nome_espaco 
                  FROM reserva 
                  INNER JOIN usuario ON reserva.usuario_id = usuario.id_usuario
                  INNER JOIN espaco ON reserva.espaco_id = espaco.id_espaco
                  WHERE reserva.id_reserva = '$reserva_id'";
          $query = mysqli_query($conexao, $sql);

          if(mysqli_num_rows($query) > 0){
            $reserva = mysqli_fetch_array($query);
      ?>
      
      <div class="reservation-profile-card">
        <div class="reservation-avatar">
          <i class="fas fa-calendar-check"></i>
        </div>
        <div class="reservation-title-display">Reserva</div>
        <div class="reservation-id-badge">ID: #<?= $reserva['id_reserva'] ?></div>
      </div>

      <div class="view-header">
        <div class="icon-badge">
          <i class="fas fa-info-circle"></i>
        </div>
        <h2 class="view-title">Informações da Reserva</h2>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-user"></i>
              Nome do Usuário
            </div>
            <div class="info-value">
              <?= htmlspecialchars($reserva['nome_usuario']) ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-door-open"></i>
              Nome do Espaço
            </div>
            <div class="info-value">
              <?= htmlspecialchars($reserva['nome_espaco']) ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-calendar-plus"></i>
              Data de Início
            </div>
            <div class="info-value">
              <?= date('d/m/Y', strtotime($reserva['data_inicio'])) ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-calendar-minus"></i>
              Data de Fim
            </div>
            <div class="info-value">
              <?= date('d/m/Y', strtotime($reserva['data_fim'])) ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-clock"></i>
              Hora de Início
            </div>
            <div class="info-value">
              <?= date('H:i', strtotime($reserva['hora_inicio'])) ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-clock"></i>
              Hora de Fim
            </div>
            <div class="info-value">
              <?= date('H:i', strtotime($reserva['hora_fim'])) ?>
            </div>
          </div>
        </div>
      </div>

      <div class="action-buttons">
        <a href="../RESERVA/reserva-index.php" class="btn btn-secondary btn-custom">
          <i class="fas fa-arrow-left me-2"></i>Voltar para Lista
        </a>
      </div>

      <?php
          } else {
      ?>
      <div class="error-state">
        <i class="fas fa-calendar-times"></i>
        <h3>Reserva Não Encontrada</h3>
        <p class="mb-4">A reserva solicitada não existe no sistema</p>
        <a href="../RESERVA/reserva-index.php" class="btn btn-primary btn-custom">
          <i class="fas fa-arrow-left me-2"></i>Voltar para Lista
        </a>
      </div>
      <?php
          }
        } else {
      ?>
      <div class="error-state">
        <i class="fas fa-exclamation-triangle"></i>
        <h3>ID Não Informado</h3>
        <p class="mb-4">Nenhum ID de reserva foi fornecido</p>
        <a href="../RESERVA/reserva-index.php" class="btn btn-primary btn-custom">
          <i class="fas fa-arrow-left me-2"></i>Voltar para Lista
        </a>
      </div>
      <?php
        }
      ?>
    </div>
  </div>

  <div class="footer-section">
    <div class="container">
      <p class="mb-0">
        <i class="fas fa-building me-2"></i>
        Sistema de Espaços Compartilhados - Desenvolvido por Maria Helena
      </p>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>