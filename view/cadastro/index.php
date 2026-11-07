<?php
    session_start();

    if (isset($_SESSION['erros'])):
?>

    <div class="modal fade" id="modalErro" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalLabel">Erro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong><?php echo $_SESSION['erros']; ?></strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sucess" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPT PARA ABRIR O MODAL AUTOMATICAMENTE -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var meuModal = new bootstrap.Modal(document.getElementById('modalErro'));
            meuModal.show();
        });
    </script>

<?php
    // Limpa a flag para o modal não abrir de novo se o usuário atualizar a página (F5)
    unset($_SESSION['erros']);

    endif;
?>

<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Novo cadastro | BAT Banco de questões</title>
    </head>

    <body>
        <div class="container align-content-stretch mt-3">
            <h1>Novo usuário</h1>

            <form action="../../controller/CadastroController.php" method="POST">

                <div class="form-field mb-3">
                    <label for="nomeId" class="form-label">Nome completo</label>
                    <input type="text" class="form-control" name="nome" id="nomeId" required>
                </div>

                <div class="form-field mb-3">
                    <label for="dataNascimentoId" class="form-label">Data de nascimento</label>
                    <input type="date" class="form-control" name="dataNascimento" id="dataNascimentoId" required>
                </div>

                <div class="form-field mb-3">
                    <label for="emailId" class="form-label">Endereço de email</label>
                    <input type="email" class="form-control" id="emailId" name="email" aria-describedby="emailHelp"
                        required>
                    <div id="emailHelp" class="form-text">Não compartilhamos seu email com ninguém.</div>
                </div>

                <div class="form-field mb-3">
                    <label for="senhaId" class="form-label">Senha</label>
                    <input type="password" class="form-control" name="senha" id="senhaId" required>
                </div>

                <p>Papel do usuário</p>

                <div class="form-field">
                    <input class="radio" name="tipoUsuario" type="radio" id="radioLabel" />
                    <label for="radioLabel">Estudante</label>
                </div>

                <div class="form-field">
                    <input class="radio" name="tipoUsuario" type="radio" id="radioLabel2" />
                    <label for="radioLabel2">Professor</label>
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-primary">Acessar</button>
                </div>

                <p class="text-start"><a href="./../../" class="text-decoration-none theme-primary">Já possui uma conta?</a></p>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>