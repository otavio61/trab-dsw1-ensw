<?php 
    require_once '../../model/VO/Questao.php';

    session_start(); 

    if(!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] != 1 || empty($_SESSION['questoes']) || !isset($_GET['id'])) {
        header("Location: questoes.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Questionários | BAT Banco de questões</title>
    </head>

    <body>
        <div class="container align-content-stretch mt-3">
            <h1>Banco BAT</h1>
            <?php $questao = $_SESSION['questoes'][array_search($_GET['id'], array_map(fn($q) => $q->id, $_SESSION['questoes']))];?>
            <form action="../../controller/ProfessorController.php" method="POST">
                <div class="form-field mb-3">
                    <label for="enunciadoId" class="form-label">Enunciado</label>
                    <input type="text" class="form-control" name="enunciado" value="<?=$questao->enunciado?>" id="enunciadoId" required>
                </div>

                <div class="form-field mb-3">
                    <label for="valorQuestaoId" class="form-label">Valor da questão</label>
                    <input type="number" step="1" min="1" class="form-control" name="valorQuestao" value="<?=$questao->valor_questao?>" id="valorQuestaoId" required>
                </div>

                <div class="form-field mb-3">
                    <label for="materiaId" class="form-label">Materia:</label>
                    <input type="text" class="form-control" name="materia" value="<?=$questao->materia?>" id="materiaId" disabled required>
                </div>

                <div class="mb-3 mt-3">
                    <input type="hidden" class="form-control" name="id" value="<?=$questao->id?>" id="questaoId" disabled required>
                    <button type="submit" name="operacao" value="editar_questao" class="btn btn-primary">Editar</button>
                    <a href="questoes.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
                </div>
            </form>

            <hr>

            <?php foreach($questao->alternativas as $alternativa): ?>
                <form action="../../controller/ProfessorController.php" method="POST">
                    <div class="form-field mb-3">
                        <label for="descricaoId" class="form-label">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" value="<?=$alternativa['descricao']?>" id="descricaoId" required>
                    </div>

                    <p>Resposta correta:</p>

                    <div class="form-field">
                        <input class="radio" name="tipoUsuario" type="radio" value="1" id="radioLabel" <?=$alternativa['resposta_correta'] == 1 ?: 'checked'?> required/>
                        <label for="radioLabel">Sim</label>
                    </div>

                    <div class="form-field">
                        <input class="radio" name="tipoUsuario" type="radio" value="0" <?=$alternativa['resposta_correta'] == 0 ?: 'checked'?> id="radioLabel2" />
                        <label for="radioLabel2">Não</label>
                    </div>

                    <div class="mb-3 mt-3">
                        <input type="hidden" class="form-control" name="id" value="<?=$alternativa['id']?>" id="alternativaId" disabled required>
                        <button type="submit" name="operacao" value="editar_alternativa_questao" class="btn btn-primary">Editar</button>
                        <a href="#"><button class="btn btn-outline-danger">Excluir</button></a>
                    </div>
                </form>
            <?php endforeach; ?>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>