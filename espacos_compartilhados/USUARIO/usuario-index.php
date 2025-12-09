<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Usuários - Gerenciamento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/usuario-index.css">
</head>
<body>
  <div class="header-section position-relative">
    <a href="../INICIO/index-inicio.php" class="back-btn">
      <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
    <div class="container text-center">
      <h1 class="page-title">Gerenciamento de Usuários</h1>
      <p class="page-subtitle">Visualize e gerencie todos os usuários cadastrados no sistema</p>
    </div>
  </div>

  <div class="container container-custom mt-5">
    <?php include('../ACOES/mensagem.php'); ?>
    
    <div class="content-section">
      <div class="section-header">
        <h2 class="section-title">
          <div class="icon-badge">
            <i class="fas fa-users"></i>
          </div>
          Lista de Usuários
        </h2>
        <a href="usuario-create.php" class="btn btn-primary btn-custom">
          <i class="fas fa-plus me-2"></i>Adicionar Usuário
        </a>
      </div>

      <?php
        $sql = "SELECT * FROM usuario ORDER BY nome_usuario";
        $usuarios = mysqli_query($conexao, $sql);
        
        if(mysqli_num_rows($usuarios) > 0){
      ?>
      <div class="table-responsive">
        <table class="table custom-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Telefone</th>
              <th>CPF</th>
              <th class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($usuarios as $usuario){
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
            <tr>
              <td>
                <span class="id-badge">#<?= $usuario['id_usuario'] ?></span>
              </td>
              <td><strong><?= htmlspecialchars($usuario['nome_usuario']) ?></strong></td>
              <td><?= htmlspecialchars($usuario['email']) ?></td>
              <td><?= $telefone_formatado ?></td>
              <td><?= $cpf_formatado ?></td>
              <td>
                <div class="action-btn-group justify-content-center">
                  <a href="usuario-view.php?id_usuario=<?= $usuario['id_usuario'] ?>" class="btn btn-secondary btn-sm">
                    <i class="fas fa-eye me-1"></i>Ver
                  </a>
                  <a href="usuario-edit.php?id_usuario=<?= $usuario['id_usuario'] ?>" class="btn btn-success btn-sm">
                    <i class="fas fa-edit me-1"></i>Editar
                  </a>
                  <form action="../ACOES/acoes.php" method="POST" class="d-inline">
                    <button onclick="return confirm('Tem certeza que deseja excluir este usuário?')" 
                            type="submit" 
                            name="delete_usuario" 
                            value="<?= $usuario['id_usuario'] ?>" 
                            class="btn btn-danger btn-sm">
                      <i class="fas fa-trash me-1"></i>Excluir
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
      </div>
      <?php
        } else {
      ?>
      <div class="empty-state">
        <i class="fas fa-users-slash"></i>
        <h3>Nenhum Usuário Encontrado</h3>
        <p class="mb-4">Comece adicionando o primeiro usuário ao sistema</p>
        <a href="usuario-create.php" class="btn btn-primary btn-custom">
          <i class="fas fa-plus me-2"></i>Adicionar Primeiro Usuário
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