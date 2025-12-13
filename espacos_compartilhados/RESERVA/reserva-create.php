<?php
require '../DB/conexao.php'; 
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adicionar Reserva</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/reserva-create.css">
</head>
<body>
  <div class="header-section position-relative">
    <a href="./reserva-index.php" class="back-btn">
      <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
    <div class="container text-center">
      <h1 class="page-title">Adicionar Reserva</h1>
      <p class="page-subtitle">Preencha os dados para cadastrar uma nova reserva no sistema</p>
    </div>
  </div>

  <div class="container container-custom mt-5">
    <?php include('../ACOES/mensagem.php'); ?>
    
    <div class="row">
      <div class="col-lg-6 mb-4">
        <div class="form-section">
          <div class="form-header">
            <div class="icon-badge">
              <i class="fas fa-calendar-plus"></i>
            </div>
            <h2 class="form-title">Dados da Reserva</h2>
          </div>

          <form action="../ACOES/acoes.php" method="POST">
            <div class="mb-3">
              <label class="form-label required-field">
                <i class="fas fa-user"></i>ID do Usuário
              </label>
              <input type="text" name="id_usuario" class="form-control" placeholder="Digite o ID do usuário" required>
            </div>

            <div class="mb-3">
              <label class="form-label required-field">
                <i class="fas fa-door-open"></i>ID do Espaço
              </label>
              <input type="text" name="id_espaco" class="form-control" placeholder="Digite o ID do espaço" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label required-field">
                  <i class="fas fa-calendar-plus"></i>Data de Início
                </label>
                <input type="date" name="data_inicio" class="form-control" required>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label required-field">
                  <i class="fas fa-calendar-minus"></i>Data de Fim
                </label>
                <input type="date" name="data_fim" class="form-control" required>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label required-field">
                  <i class="fas fa-clock"></i>Horário de Início
                </label>
                <input type="time" name="hora_inicio" class="form-control" required>
              </div>

              <div class="col-md-6 mb-3">
                <label class="form-label required-field">
                  <i class="fas fa-clock"></i>Horário de Fim
                </label>
                <input type="time" name="hora_fim" class="form-control" required>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" name="create_reserva" class="btn btn-submit">
                <i class="fas fa-save"></i>Salvar Reserva
              </button>
              <a href="./reserva-index.php" class="btn btn-secondary btn-custom">
                <i class="fas fa-times me-2"></i>Cancelar
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="info-section mb-4">
          <div class="info-section-header">
            <div class="icon-badge">
              <i class="fas fa-door-open"></i>
            </div>
            <h2 class="info-section-title">Lista de Espaços</h2>
          </div>

          <div class="table-container">
            <div class="table-responsive">
              <table class="table custom-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Capacidade</th>
                    <th>Descrição</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM espaco";
                    $espacos = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($espacos) > 0){
                      foreach($espacos as $espaco){
                        $sql_reserva = "SELECT * FROM reserva WHERE espaco_id = '".$espaco['id_espaco']."'";
                        $reservas = mysqli_query($conexao, $sql_reserva);
                        $status_reserva = (mysqli_num_rows($reservas) > 0) ? 'Reservado' : 'Livre';
                  ?>
                    <tr>
                      <td><?= $espaco['id_espaco'] ?></td>
                      <td><?= htmlspecialchars($espaco['nome_espaco']) ?></td>
                      <td><?= htmlspecialchars($espaco['tipo']) ?></td>
                      <td><?= $espaco['capacidade'] ?></td>
                      <td><?= htmlspecialchars($espaco['descricao']) ?></td>
                      <td>
                        <span class="badge <?= ($status_reserva == 'Reservado') ? 'bg-danger' : 'bg-success' ?>">
                          <?= $status_reserva ?>
                        </span>
                      </td>
                    </tr>
                  <?php
                      }
                    } else {
                      echo '<tr><td colspan="6" class="text-center">Nenhum Espaço Encontrado!</td></tr>';
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="info-section">
          <div class="info-section-header">
            <div class="icon-badge">
              <i class="fas fa-users"></i>
            </div>
            <h2 class="info-section-title">Lista de Usuários</h2>
          </div>

          <div class="table-container">
            <div class="table-responsive">
              <table class="table custom-table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM usuario";
                    $usuarios = mysqli_query($conexao, $sql);
                    if(mysqli_num_rows($usuarios) > 0){
                      foreach($usuarios as $usuario){
                  ?>
                  <tr>
                    <td><?= $usuario['id_usuario'] ?></td>
                    <td><?= htmlspecialchars($usuario['nome_usuario']) ?></td>
                    <td><?= htmlspecialchars($usuario['email']) ?></td>
                    <td><?= $usuario['telefone'] ?></td>
                    <td><?= $usuario['cpf'] ?></td>
                  </tr>
                  <?php
                      }
                    } else {
                      echo '<tr><td colspan="5" class="text-center">Nenhum Usuário Encontrado!</td></tr>';
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
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