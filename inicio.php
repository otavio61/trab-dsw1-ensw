<?php 

    session_start(); 

    if(!isset($_SESSION['usuario_id'])) {
        header("Location: index.php"); 
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Página Inicial | BAT Banco de questões</title>
</head>
<body class="container mt-4">
    <a href="logoff.php" class="btn btn-danger">Sair</a>

    <?php if (isset($_SESSION['sucesso'])): ?>
        <div class="modal fade" id="modalBemVindo" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="modalLabel">Login Realizado!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Seja muito bem-vindo, <strong><?php echo $_SESSION['usuario_email']; ?></strong>! É ótimo tê-lo por aqui.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Começar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCRIPT PARA ABRIR O MODAL AUTOMATICAMENTE -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var meuModal = new bootstrap.Modal(document.getElementById('modalBemVindo'));
                meuModal.show();
            });
        </script>

        <?php 
            // Limpa a flag para o modal não abrir de novo se o usuário atualizar a página (F5)
            unset($_SESSION['sucesso']); 
        ?>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>