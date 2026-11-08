<?php
    require_once '../model/UsuarioDAO.php';

    session_start(); // Inicia a sessão para poder guardar os dados do usuário logado

    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $consulta = new UsuarioDAO()->obterUsuario($form['email'], $form['senha']);

    if($consulta){
        $_SESSION['nome'] = $consulta->nome;
        $_SESSION['email'] = $consulta->email;
        $_SESSION['tipo_usuario'] = $consulta->tipo_usuario;

        $_SESSION['sucesso'] = true; // marca o sucesso pra verificar depois no inicio
        header('Location: ../view/dashboard/');
        exit;
    }else{
        $_SESSION['erros'] = 'Email ou senha incorretos'; // Caso não achar no BD, ele manda de volta pro login
        header('Location: index.php');
        exit;
    }

