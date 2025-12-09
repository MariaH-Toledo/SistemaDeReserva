<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espaços - Editar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/espaco-edit.css">
</head>
<body>
    <div class="header-section position-relative">
        <a href="./espaco-index.php" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
        <div class="container text-center">
            <h1 class="page-title">Editar Espaço</h1>
            <p class="page-subtitle">Atualize as informações do espaço cadastrado</p>
        </div>
    </div>

    <div class="container container-custom mt-5">
        <div class="form-section">
            <?php
                if(isset($_GET['id_espaco'])){
                    $espaco_id = mysqli_real_escape_string($conexao, $_GET['id_espaco']);
                    $sql = "SELECT * FROM espaco WHERE id_espaco='$espaco_id'";
                    $query = mysqli_query($conexao, $sql);

                    if(mysqli_num_rows($query) > 0){
                        $espaco = mysqli_fetch_array($query);
            ?>

            <div class="form-header">
                <div class="icon-badge">
                    <i class="fa-regular fa-building"></i>
                </div>
                <div>
                    <h2 class="form-title">Editar Dados do Espaço</h2>
                    <div class="espaco-id-display mt-2">
                        <i class="fas fa-hashtag"></i>ID: <?= $espaco['id_espaco'] ?>
                    </div>
                </div>
            </div>

            <form action="../ACOES/acoes.php" method="POST">
                <input type="hidden" name="espaco_id" value="<?= $espaco['id_espaco'] ?>">
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-regular fa-building"></i>Nome Espaço
                        </label>
                        <input type="text" name="nome_espaco" value="<?= htmlspecialchars($espaco['nome_espaco']) ?>" class="form-control" placeholder="Digite o nome do espaço" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-regular fa-building"></i>Tipo
                        </label>
                        <input type="text" name="tipo" value="<?= htmlspecialchars($espaco['tipo']) ?>" class="form-control" placeholder="Digite o tipo de espaço" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-regular fa-building"></i>Capacidade de pessoas
                        </label>
                        <input type="number" name="capacidade" value="<?= htmlspecialchars($espaco['capacidade']) ?>" class="form-control" placeholder="Capacidade de pessoas" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-regular fa-building"></i>Descrição
                        </label>
                        <input type="text" name="descricao" value="<?= htmlspecialchars($espaco['descricao']) ?>" class="form-control" placeholder="Descrição do local" required>
                    </div>
                </div>

                <div class="form-action">
                    <button type="submit" name="update_espaco" class="btn btn-submit">
                        <i class="fas fa-save"></i>Salvar Alterações
                    </button>
                    <a href="./espaco-index.php" class="btn btn-secondary btn-custom">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </a>
                </div>
            </form>
            
            <?php
                } else{
            ?>
            <div class="error-state">
                <i class="fa-regular fa-building"></i>
                <h3>Espaço Não Encontrado</h3>
                <p class="mb-4">O espaço solicitado não existe no sistema</p>
                <a href="./espaco-index.php" class="btn btn-primary btn-custom">
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
                <a href="./espaco-index.php" class="btn btn-primary btn-custom">
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