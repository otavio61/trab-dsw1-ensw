<?php 
    require_once '../../model/VO/Questao.php';

    session_start(); 

    if(!isset($_SESSION['id']) || $_SESSION['tipo_usuario'] != 1 || empty($_SESSION['questoes'])) {
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
        <title>Questionários | BAT Banco de questões</title>
    </head>

    <body>
        <div class="container">
            <h1>Questões presentes no banco</h1>
            
            <div class="mb-3 mt-3">
                <a href="../dashboard/"><button type="button" class="btn btn-secondary">Voltar</button></a>
                <a href="../../controller/ProfessorController.php?operacao=buscar_materias"><button type="button" class="btn btn-primary">Nova questão</button></a>
            </div>

            <?php if(isset($_SESSION['questoes'])): $letras = range('A', 'Z'); ?>
                
                    <?php foreach($_SESSION['questoes'] as $indice => $questao): ?>
                
                        <div class="card mb-3 shadow-sm">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Questão <?=$indice + 1?></strong>
                                    <span class="text-muted small ms-2"><?=$questao->materia?> - ID: <?=$questao->id?></span>
                                </div>

                                <span class="badge text-bg-primary"><?=$questao->valor_questao?> ponto</span>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title mb-3"><?=$questao->enunciado?></h5>

                                <p class="text-muted small fw-semibold mb-2">Alternativas</p>
                                
                                <ul class="list-group">
                                    <?php foreach($questao->alternativas as $i => $alternativa): ?>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <?=$letras[$i]?>) <?=$alternativa['descricao']?>
                                            <?=$alternativa['resposta_correta'] ? '<span class="text-success">✓</span>' : '<span class="text-danger">✕</span>'?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                            <div class="card-footer d-flex justify-content-end gap-2">
                                <a href="editar-questao.php?id=<?=$questao->id?>"><button class="btn btn-outline-primary btn-sm">Editar</button></a>
                                <a href="#"><button class="btn btn-outline-danger btn-sm">Excluir</button></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
            <?php endif; ?>
        </div>
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>