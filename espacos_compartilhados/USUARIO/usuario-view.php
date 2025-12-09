<?php
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Visualizar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/usuario-view.css">
</head>
<body>
  <div class="header-section position-relative">
    <a href="../USUARIO/usuario-index.php" class="back-btn">
      <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
    <div class="container text-center">
      <h1 class="page-title">Visualizar Usuário</h1>
      <p class="page-subtitle">Detalhes completos do usuário cadastrado</p>
    </div>
  </div>

  <div class="container container-custom mt-5">
    <div class="view-section">
      <?php
        if(isset($_GET['id_usuario'])){
          $usuario_id = mysqli_real_escape_string($conexao, $_GET['id_usuario']);
          $sql = "SELECT * FROM usuario WHERE id_usuario = '$usuario_id'";
          $query = mysqli_query($conexao, $sql);

          if(mysqli_num_rows($query) > 0){
            $usuario = mysqli_fetch_array($query);
            
            $telefone = $usuario['telefone'];
            if(strlen($telefone) == 11){
              $telefone_formatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 5) . '-' . substr($telefone, 7);
            } else if(strlen($telefone) == 10){
              $telefone_formatado = '(' . substr($telefone, 0, 2) . ') ' . substr($telefone, 2, 4) . '-' . substr($telefone, 6);
            } else {
              $telefone_formatado = $telefone;
            }
            
            $cpf = $usuario['cpf'];
            if(strlen($cpf) == 11){
              $cpf_formatado = substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
            } else {
              $cpf_formatado = $cpf;
            }
      ?>
      
      <div class="user-profile-card">
        <div class="user-avatar">
          <i class="fas fa-user"></i>
        </div>
        <div class="user-name-display"><?= htmlspecialchars($usuario['nome_usuario']) ?></div>
        <div class="user-id-badge">ID: #<?= $usuario['id_usuario'] ?></div>
      </div>

      <div class="view-header">
        <div class="icon-badge">
          <i class="fas fa-info-circle"></i>
        </div>
        <h2 class="view-title">Informações do Usuário</h2>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-user"></i>
              Nome Completo
            </div>
            <div class="info-value">
              <?= htmlspecialchars($usuario['nome_usuario']) ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-envelope"></i>
              E-mail
            </div>
            <div class="info-value">
              <?= htmlspecialchars($usuario['email']) ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-phone"></i>
              Telefone
            </div>
            <div class="info-value">
              <?= $telefone_formatado ?>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="info-card">
            <div class="info-label">
              <i class="fas fa-id-card"></i>
              CPF
            </div>
            <div class="info-value">
              <?= $cpf_formatado ?>
            </div>
          </div>
        </div>
      </div>

      <div class="action-buttons">
        <a href="../USUARIO/usuario-index.php" class="btn btn-secondary btn-custom">
          <i class="fas fa-arrow-left me-2"></i>Voltar para Lista
        </a>
      </div>

      <?php
          } else {
      ?>
      <div class="error-state">
        <i class="fas fa-user-slash"></i>
        <h3>Usuário Não Encontrado</h3>
        <p class="mb-4">O usuário solicitado não existe no sistema</p>
        <a href="../USUARIO/usuario-index.php" class="btn btn-primary btn-custom">
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
        <p class="mb-4">Nenhum ID de usuário foi fornecido</p>
        <a href="../USUARIO/usuario-index.php" class="btn btn-primary btn-custom">
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