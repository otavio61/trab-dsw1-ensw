<?php
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