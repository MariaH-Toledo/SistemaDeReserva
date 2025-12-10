<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reservas - Gerenciamento</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/reserva-index.css">
</head>
<body>
  <div class="header-section position-relative">
    <a href="../INICIO/index-inicio.php" class="back-btn">
      <i class="fas fa-arrow-left me-2"></i>Voltar
    </a>
    <div class="container text-center">
      <h1 class="page-title">Gerenciamento de Reservas</h1>
      <p class="page-subtitle">Visualize e gerencie todas as reservas cadastradas no sistema</p>
    </div>
  </div>

  <div class="container container-custom mt-5">
    <?php include('../ACOES/mensagem.php'); ?>
    
    <div class="content-section">
      <div class="section-header">
        <h2 class="section-title">
          <div class="icon-badge">
            <i class="fas fa-calendar-check"></i>
          </div>
          Lista de Reservas
        </h2>
        <a href="reserva-create.php" class="btn btn-primary btn-custom">
          <i class="fas fa-plus me-2"></i>Fazer Reserva
        </a>
      </div>

      <?php
        $sql = "SELECT reserva.id_reserva, reserva.espaco_id, espaco.nome_espaco, espaco.tipo, espaco.capacidade, espaco.descricao
                FROM reserva
                INNER JOIN espaco ON reserva.espaco_id = espaco.id_espaco";
        $reservas = mysqli_query($conexao, $sql);
        
        if(mysqli_num_rows($reservas) > 0){
      ?>
      <div class="table-responsive">
        <table class="table custom-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome do Espaço Reservado</th>
              <th>Tipo</th>
              <th>Capacidade</th>
              <th>Descrição</th>
              <th class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($reservas as $reserva){
            ?>
            <tr>
              <td>
                <span class="id-badge">#<?= $reserva['id_reserva'] ?></span>
              </td>
              <td><strong><?= htmlspecialchars($reserva['nome_espaco']) ?></strong></td>
              <td><?= htmlspecialchars($reserva['tipo']) ?></td>
              <td><?= $reserva['capacidade'] ?></td>
              <td><?= htmlspecialchars($reserva['descricao']) ?></td>
              <td>
                <div class="action-btn-group justify-content-center">
                  <a href="reserva-view.php?id_reserva=<?= $reserva['id_reserva'] ?>" class="btn btn-secondary btn-sm">
                    <i class="fas fa-eye me-1"></i>Ver
                  </a>
                  <form action="../ACOES/acoes.php" method="POST" class="d-inline">
                    <button onclick="return confirm('Tem certeza que deseja cancelar esta reserva?')" 
                            type="submit" 
                            name="delete_reserva" 
                            value="<?= $reserva['id_reserva'] ?>" 
                            class="btn btn-danger btn-sm">
                      <i class="fas fa-trash me-1"></i>Cancelar
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
        <i class="fas fa-calendar-times"></i>
        <h3>Nenhuma Reserva Encontrada</h3>
        <p class="mb-4">Comece adicionando a primeira reserva ao sistema</p>
        <a href="reserva-create.php" class="btn btn-primary btn-custom">
          <i class="fas fa-plus me-2"></i>Fazer Primeira Reserva
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