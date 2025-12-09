<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Espaços - Criar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../CSS/espaco-create.css">
  </head>
  <body>
    <div class="header-section position-relative">
        <a href="./espaco-index.php" class="back-btn">
            <i class="fas fa-arrow-left me-2"></i>Voltar
        </a>
        <div class="container text-center">
            <h1 class="page-title">Adicionar Espaço</h1>
            <p class="page-subtitle">Preencha os dados para cadastrar um novo espaço no sistema</p>
        </div>
    </div>


    <div class="container container-custom mt-5">
        <div class="form-section">
            <div class="form-header">
                <div class="icon-badge">
                    <i class="fa-regular fa-building"></i>
                </div>
                <h2 class="form-title">Dados do Espaço</h2>
            </div>

            <form action="../ACOES/acoes.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-regular fa-building"></i>Nome Espaço
                        </label>
                        <input type="text" name="nome_espaco" class="form-control" placeholder="Digite o nome do espaço" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-regular fa-font-awesome"></i>Tipo
                        </label>
                        <input type="text" name="tipo" class="form-control" placeholder="Digite o tipo do espaço" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-solid fa-warehouse"></i>Capacidade de pessoas
                        </label>
                        <input type="number" name="capacidade" class="form-control" placeholder="Digite a capacidade de pessoas" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label required-field">
                            <i class="fa-solid fa-pen"></i>Descrição
                        </label>
                        <input type="text" name="descricao" class="form-control" placeholder="Digite a descrição do espaço" required>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" name="create_espaco" class="btn btn-submit">
                        <i class="fas fa-save"></i>Salvar Espaço
                    </button>
                    <a href="./espaco-index.php" class="btn btn-secondary btn-custom">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </a>
                </div>
            </form>
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