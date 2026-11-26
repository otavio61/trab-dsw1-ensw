<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET')
        $operacao = $_GET['operacao'];
    else if ($_SERVER['REQUEST_METHOD'] === 'POST')
        $operacao = $_POST['operacao'];

    $professorController = new ProfessorController();

    switch($operacao){
        case 'obter_questoes':
            $professorController->obterQuestoes();
        break;

        case 'buscar_materias':
            $professorController->obterMateriasQuestao();
        break;

        case 'cadastrar_questao':
            $professorController->adicionarQuestao();
        break;        

        default:
            header('Location: ../');
            exit;
    }

    class ProfessorController{
        public function obterQuestoes(){
            require_once '../model/QuestaoDAO.php';
            require_once '../model/VO/Questao.php';

            session_start();

            $questoesDAO = new QuestaoDAO();

            $_SESSION['questoes'] = $questoesDAO->obterQuestoes();

            header('Location: ../view/area-professor/questoes.php');
        }

        public function obterMateriasQuestao(){
            require_once '../model/QuestaoDAO.php';
            require_once '../model/VO/Questao.php';

            session_start();

            $questoesDAO = new QuestaoDAO();

            $_SESSION['materias'] = $questoesDAO->obterMaterias();

            header('Location: ../view/area-professor/nova-questao.php');
        }

        public function adicionarQuestao(){
            require_once '../model/QuestaoDAO.php';

            session_start();

            $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $questoesDAO = new QuestaoDAO();

            $_SESSION['status_cadastro'] = $questoesDAO->adicionarQuestao($form);

            ProfessorController::obterQuestoes();
        }
    }