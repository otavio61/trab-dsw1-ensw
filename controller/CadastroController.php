<?php
    require_once '../model/UsuarioDAO.php';

    session_start();

    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $usuarioDAO = new UsuarioDAO();

    $resultado = $usuarioDAO->registrarUsuario($form);

    if($resultado){
        header('Location: ../');
    }

