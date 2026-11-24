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

        case 'sair':
            $usuarioController->logoff();
        break;

        case 'registrar':
            $usuarioController->cadastrarUsuario();
        break;        

        default:
            header('Location: ../');
            exit;
    }

    class ProfessorController{
        public function obterQuestoes(){
            require_once '../model/QuestoesDAO.php';
            require_once '../model/VO/Questao.php';

            session_start();

            $questoesDAO = new QuestoesDAO();

            $_SESSION['questoes'] = $questoesDAO->obterQuestoes();

            header('Location: ../view/area-professor/questoes.php');
        }
    }