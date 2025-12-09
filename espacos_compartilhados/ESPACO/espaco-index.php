<?php
session_start();
require '../DB/conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espaços - Gerenciamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../CSS/espaco-index.css">
</head>
<body>
    <div class="header-section position-relative">
        <a href="../INICIO/index-inicio.php" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
        <div class="container text-center">
            <h1 class="page-title">Gerenciamento de Espaços</h1>
            <p class="page-subtitle">Visualize e gerencie todos os espaços cadastrados no sistema</p>
        </div>
    </div>

    <div class="container container-custom mt-5">
        <?php include('../ACOES/mensagem.php'); ?>

        <div class="content-section">
            <div class="section-header">
                <h2 class="section-title">
                    <div class="icon-badge">
                        <i class="fa-solid fa-building"></i>
                    </div>
                    Lista de Espaços
                </h2>
                <a href="espaco-create.php" class="btn btn-primary btn-custom">
                    <i class="fas fa-plus me-2"></i>Adicionar Espaço
                </a>
            </div>

            <?php
                $sql = "SELECT * FROM espaco ORDER BY nome_espaco";
                $espacos = mysqli_query($conexao, $sql);

                if(mysqli_num_rows($espacos) > 0) {
            ?>
            <div class="table-responsive">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Capacidade</th>
                            <th>Descrição</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($espaco = mysqli_fetch_assoc($espacos)) { ?>
                        <tr>
                            <td>
                                <span class="id-badge">#<?= $espaco['id_espaco'] ?></span>
                            </td>
                            <td><strong><?= htmlspecialchars($espaco['nome_espaco']) ?></strong></td>
                            <td><?= htmlspecialchars($espaco['tipo']) ?></td>
                            <td><?= htmlspecialchars($espaco['capacidade']) ?></td>
                            <td><?= htmlspecialchars($espaco['descricao']) ?></td>
                            <td>
                                <div class="action-btn-group justify-content-center">
                                    <a href="espaco-view.php?id_espaco=<?= $espaco['id_espaco'] ?>" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-eye me-1"></i>Ver
                                    </a>
                                    <a href="espaco-edit.php?id_espaco=<?= $espaco['id_espaco'] ?>" class="btn btn-success btn-sm">
                                        <i class="fas fa-edit me-1"></i>Editar
                                    </a>
                                    <form action="../ACOES/acoes.php" method="POST" class="d-inline">
                                        <button onclick="return confirm('Tem certeza que deseja excluir este espaco?')"
                                                type="submit"
                                                name="delete_espaco"
                                                value="<?= $espaco['id_espaco'] ?>"
                                                class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash me-1"></i>Excluir
                                        </button>
                                    </form>
                                </div> 
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php
                } else {
            ?>
            <div class="empty-state">
                <i class="fas fa-building"></i>
                <h3>Nenhum Espaço Encontrado</h3>
                <p class="mb-4">Comece adicionando o primeiro espaço ao sistema</p>
                <a href="espaco-create.php" class="btn btn-primary btn-custom">
                    <i class="fas fa-plus me-2"></i>Adicionar Primeiro Espaco
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