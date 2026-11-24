<?php 
    require_once '../../model/VO/Questao.php';

    session_start(); 

    if(!isset($_SESSION['id']) && $_SESSION['tipo_usuario'] != 1) {
        header("Location: ../../");
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
        <div class="container">
            <h1>Questões presentes no banco</h1>
            
            <div class="mb-3 mt-3">
                <a href="../dashboard/"><button type="button" class="btn btn-primary">Voltar</button></a>
                <a href="#"><button type="button" class="btn btn-primary">Nova questão</button></a>
            </div>

            <?php if(isset($_SESSION['questoes'])): ?>
                
                <ul class="list-group">
                    <?php foreach($_SESSION['questoes'] as $questao): ?>
                        <li class='list-group-item'>ID: <?=$questao->id?></li>
                        <li class='list-group-item'>Enunciado: <?=$questao->enunciado?></li>
                        <li class='list-group-item'>Valor da questao: <?=$questao->valor_questao?></li>
                        <li class='list-group-item'>Materia: <?=$questao->materia?></li>
                        <li class='list-group-item'>Alternativas:
                            <ul class="list-group">
                                <?php foreach($questao->alternativas as $alternativa): ?>
                                    <li class='list-group-item'>Descricao: <?=$alternativa['descricao']?></li>
                                    <li class='list-group-item'>Resposta correta: <?=$alternativa['resposta_correta'] ? 'Sim' : 'Não'?></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endforeach; ?>
                </ul>

            <?php endif; ?>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>