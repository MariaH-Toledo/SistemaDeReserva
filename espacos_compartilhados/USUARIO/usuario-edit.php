<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Usuário</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/usuario-edit.css">
</head>
<body>
  <div class="header-section position-relative">
    <a href="./usuario-index.php" class="back-btn">
      <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
    <div class="container text-center">
      <h1 class="page-title">Editar Usuário</h1>
      <p class="page-subtitle">Atualize as informações do usuário cadastrado</p>
    </div>
  </div>

  <div class="container container-custom mt-5">
    <div class="form-section">
      <?php
        if(isset($_GET['id_usuario'])){
          $usuario_id = mysqli_real_escape_string($conexao, $_GET['id_usuario']);
          $sql = "SELECT * FROM usuario WHERE id_usuario='$usuario_id'";
          $query = mysqli_query($conexao, $sql);

          if(mysqli_num_rows($query) > 0){
            $usuario = mysqli_fetch_array($query);
      ?>
      
      <div class="form-header">
        <div class="icon-badge">
          <i class="fas fa-user-edit"></i>
        </div>
        <div>
          <h2 class="form-title">Editar Dados do Usuário</h2>
          <div class="user-id-display mt-2">
            <i class="fas fa-hashtag"></i>ID: <?= $usuario['id_usuario'] ?>
          </div>
        </div>
      </div>

      <form action="../ACOES/acoes.php" method="POST">
        <input type="hidden" name="usuario_id" value="<?= $usuario['id_usuario'] ?>">
        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label required-field">
              <i class="fas fa-user"></i>Nome Completo
            </label>
            <input type="text" name="nome_usuario" value="<?= htmlspecialchars($usuario['nome_usuario']) ?>" class="form-control" placeholder="Digite o nome completo" required>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label required-field">
              <i class="fas fa-envelope"></i>E-mail
            </label>
            <input type="text" name="email" value="<?= htmlspecialchars($usuario['email']) ?>" class="form-control" placeholder="exemplo@email.com" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label required-field">
              <i class="fas fa-phone"></i>Telefone
            </label>
            <input type="text" name="telefone" value="<?= htmlspecialchars($usuario['telefone']) ?>" class="form-control" placeholder="Digite apenas números" required>
          </div>

          <div class="col-md-6 mb-3">
            <label class="form-label required-field">
              <i class="fas fa-id-card"></i>CPF
            </label>
            <input type="text" name="cpf" value="<?= htmlspecialchars($usuario['cpf']) ?>" class="form-control" placeholder="Digite apenas números" required>
          </div>
        </div>

        <div class="form-actions">
          <button type="submit" name="update_usuario" class="btn btn-submit">
            <i class="fas fa-save"></i>Salvar Alterações
          </button>
          <a href="./usuario-index.php" class="btn btn-secondary btn-custom">
            <i class="fas fa-times me-2"></i>Cancelar
          </a>
        </div>
      </form>

      <?php
          } else {
      ?>
      <div class="error-state">
        <i class="fas fa-user-slash"></i>
        <h3>Usuário Não Encontrado</h3>
        <p class="mb-4">O usuário solicitado não existe no sistema</p>
        <a href="./usuario-index.php" class="btn btn-primary btn-custom">
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
        <a href="./usuario-index.php" class="btn btn-primary btn-custom">
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