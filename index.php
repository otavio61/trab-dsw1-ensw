<?php 
    session_start(); 

    if(isset($_SESSION['erros'])): 
?>

        <div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="modalLabel">Erro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <strong>teste: <?php echo $_SESSION['erros']; ?></strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sucess" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- SCRIPT PARA ABRIR O MODAL AUTOMATICAMENTE -->
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var meuModal = new bootstrap.Modal(document.getElementById('modalErro'));
                meuModal.show();
            });
        </script>

        <?php 
            // Limpa a flag para o modal não abrir de novo se o usuário atualizar a página (F5)
            unset($_SESSION['sucesso']); 
        ?>
    <?php endif;

    if(isset($_SESSION['usuario_id'])) {
        header("Location: inicio.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Login | BAT Banco de questões</title>
    </head>

    <body class="container">
        <form action="logon.php" method="POST">
            <div class="mb-3">
                <label for="emailId" class="form-label">Endereço de email</label>
                <input type="email" class="form-control" id="emailId" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Não compartilhamos seu email com ninguém.</div>
            </div>

            <div class="mb-3">
                <label for="senhaId" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" id="senhaId">
            </div>

            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Acessar</button>

            <p class="text-start"><a href="#" class="text-decoration-none">Primeiro Acesso?</a></p>

        </form>

         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>

</html>