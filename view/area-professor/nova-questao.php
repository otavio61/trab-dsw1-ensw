<?php 
    session_start(); 

    if(!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] != 1 || empty($_SESSION['materias'])) {
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

            <form action="../../controller/ProfessorController.php" method="POST">
                <div class="form-field mb-3">
                    <label for="enunciadoId" class="form-label">Enunciado</label>
                    <input type="text" class="form-control" name="enunciado" id="enunciadoId" required>
                </div>

                <div class="form-field mb-3">
                    <label for="valorQuestaoId" class="form-label">Valor da questão</label>
                    <input type="number" step="1" min="1" class="form-control" name="valorQuestao" id="valorQuestaoId" required>
                </div>

                <div class="form-field mb-3">
                    <label for="materiaId" class="form-label">Materia:</label>

                    <select name="materia" id="materiaId">
                        <?php foreach ($_SESSION['materias'] as $materia): ?>
                            <option value=<?= $materia['id']?>><?= $materia['nome']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3 mt-3">
                    <button type="submit" name="operacao" value="cadastrar_questao" class="btn btn-primary">Cadastrar</button>
                </div>
            </form>

            <div class="mb-3 mt-3">
                <a href="questoes.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>