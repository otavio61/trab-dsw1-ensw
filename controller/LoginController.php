<?php
    require_once "../service/UsuarioService.php";

    // Inicia a sessão para poder guardar os dados do usuário logado
    session_start();

    $form = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    $service = new UsuarioService();

    $consulta = $service->obterUsuario($form["email"], $form["senha"]);

    var_dump($consulta);