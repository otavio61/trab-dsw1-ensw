<?php 
    session_start(); 

    if(!isset($_SESSION['id']) && $_SESSION['tipo_usuario'] != 1) {
        header("Location: ../../");
        exit;
    }

    require_once '../../model/QuestoesDAO.php';
    require_once '../../config/Conexao.php'; // temporario
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
        <?php 
            $questoes = new QuestoesDAO();
            $resultado = $questoes->obterQuestoes();
        ?>

        <ul class="list-group">
            <?php foreach($resultado as $linha): ?>
                <li class='list-group-item'>ID: <?=$linha['id']?></li>
                <li class='list-group-item'>Enunciado: <?=$linha['enunciado']?></li>
                <li class='list-group-item'>Descricao: <?=$linha['descricao']?></li>
                <li class='list-group-item'>Resposta correta: <?=$linha['resposta_correta'] ? 'Sim' : 'Não'?></li>
           <?php endforeach ?>
        </ul>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>