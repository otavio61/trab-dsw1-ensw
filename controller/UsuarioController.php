<?php
    if($_SERVER['REQUEST_METHOD'] === 'GET')
        $operacao = $_GET['operacao'];
    else if ($_SERVER['REQUEST_METHOD'] === 'POST')
        $operacao = $_POST['operacao'];

    $usuarioController = new UsuarioController();

    switch(strtolower($operacao)){
        case 'acessar':
            $usuarioController->login();
        break;

        case 'sair':
            $usuarioController->logoff();
        break;

        case 'registrar':
            $usuarioController->cadastrarUsuario();
        break;        

        default:
            header('Location: ../');
    }

    class UsuarioController{

        public function login(){
            require_once '../model/UsuarioDAO.php';

            session_start(); // Inicia a sessão para poder guardar os dados do usuário logado

            $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $usuarioDAO = new UsuarioDAO();

            $consulta = $usuarioDAO->obterUsuario($form);

            if($consulta){
                $_SESSION['id'] = $consulta->id;
                $_SESSION['nome'] = $consulta->nome;
                $_SESSION['email'] = $consulta->email;
                $_SESSION['tipo_usuario'] = $consulta->tipo_usuario;

                $_SESSION['sucesso'] = true; // marca o sucesso pra verificar depois no inicio
                header('Location: ../view/dashboard/');
            }else{
                $_SESSION['erros'] = 'Email ou senha incorretos'; // Caso não achar no BD, ele manda de volta pro login
                header('Location: ../');
            }
        }

        public function logoff(){
            // precisa iniciar a sessão pra poder destruir (acho meio estranho você começar a sessão pra destruir, mas okay, PHP que decide kk)
            session_start(); // O php precisa carregar a sessão salva na memória primeiro pra depois destruir

            // Limpa todas as variáveis de sessão
            $_SESSION = [];
            session_destroy();

            header("Location: ../");
        }

        public function cadastrarUsuario(){
            require_once '../model/UsuarioDAO.php';

            session_start();

            $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $usuarioDAO = new UsuarioDAO();

            $resultado = $usuarioDAO->registrarUsuario($form);

            if($resultado){
                $_SESSION['sucesso_cadastro'] = 'Usuário cadastrado com sucesso!'; 
                header('Location: ../');
            }else{
                $_SESSION['erros'] = 'Erro ao registrar o usuário, tente novamente';
                header('Location: ../view/cadastro/');
            }
        }
    }