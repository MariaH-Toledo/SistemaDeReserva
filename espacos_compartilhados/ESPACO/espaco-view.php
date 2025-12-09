<?php
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espaços - Visualizar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/espaco-view.css">
</head>
<body>
    <div class="header-section position-relative">
        <a href="../ESPACO/espaco-index.php" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
        <div class="container text-center">
            <h1 class="page-title">Visualizar Espaços</h1>
            <p class="page-subtitle">Detalhes completos do espaco cadastrado</p>
        </div>
    </div>

    <div class="container container-custom mt-5">
        <div class="view-section">
            <?php
            if(isset($_GET['id_espaco'])) {
                $espaco_id = mysqli_real_escape_string($conexao, $_GET['id_espaco']);
                $sql = "SELECT * FROM espaco WHERE id_espaco = '$espaco_id'";
                $query = mysqli_query($conexao, $sql);
                
                if(mysqli_num_rows($query) > 0) {
                    $espaco = mysqli_fetch_assoc($query);
            ?>

            <div class="espaco-card">
                <div class="espaco-avatar">
                    <i class="fa-regular fa-building"></i>
                </div>
                <div class="espaco-name-display"><?= htmlspecialchars($espaco['nome_espaco']) ?></div>
                <div class="espaco-id-badge">ID: #<?= $espaco['id_espaco'] ?></div>
            </div>

            <div class="view-header">
                <div class="icon-badge">
                    <i class="fas fa-info-circle"></i>
                </div>
                <h2 class="view-title">Informações do Espaço</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">
                            <i class="fa-regular fa-building"></i>Nome Espaço
                        </div>
                        <div class="info-value">
                            <?= htmlspecialchars($espaco['nome_espaco']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">
                            <i class="fa-regular fa-building"></i>Tipo
                        </div>
                        <div class="info-value">
                            <?= htmlspecialchars($espaco['tipo']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">
                            <i class="fa-regular fa-building"></i>Capacidade de pessoas
                        </div>
                        <div class="info-value">
                            <?= htmlspecialchars($espaco['capacidade']) ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-card">
                        <div class="info-label">
                            <i class="fa-regular fa-building"></i>Descrição
                        </div>
                        <div class="info-value">
                            <?= htmlspecialchars($espaco['descricao']) ?>
                        </div>
                    </div>
                </div>  
            </div>

            <div class="action-buttons">
                <a href="../ESPACO/espaco-index.php" class="btn btn-secondary btn-custom">
                    <i class="fas fa-arrow-left me-2"></i>Voltar para Lista
                </a>
            </div>
            
            <?php
                } else {
            ?>
            <div class="error-state">
                <i class="fa-regular fa-building"></i>
                <h3>Espaço Não Encontrado</h3>
                <p class="mb-4">O espaço solicitado não existe no sistema</p>
                <a href="../ESPACO/espaco-index.php" class="btn btn-primary btn-custom">
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
                <p class="mb-4">Nenhum ID de espaço foi fornecido</p>
                <a href="../ESPACO/espaco-index.php" class="btn btn-primary btn-custom">
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