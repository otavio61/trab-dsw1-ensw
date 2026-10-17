<?php
// Inicia a sessão para poder guardar os dados do usuário logado
    session_start();

    include "config/conexao.php"; 

    $conn = Conexao::criarConexao();

    if($conn == null) {
        echo '<div class="alert alert-danger" role="alert">Erro crítico de conexão com o banco!</div>';
        exit;
    }

    $statement = $conn->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
    $statement->bindParam(":email", $_POST['email']);
    $statement->bindParam(":senha", $_POST['senha']);

    $statement->execute();
    
    if($usuario = $statement->fetchObject()){
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_email'] = $usuario->email;

        $_SESSION['sucesso'] = true; // marca o sucesso pra verificar depois no inicio

        header('Location: inicio.php');
        exit;
    }else{
        // Caso não achar no BD, ele manda de volta pro login
        $_SESSION['erros'] = 'Email ou senha incorretos';
        header('Location: index.php');
        exit;
    }


    // '->' é usado para contextos de objeto, enquanto '::' é usado para contextos de classe. 
    // (use '::' para acessar métodos e atributos estáticos de uma classe, e '->' para acessar métodos e atributos de instâncias de objetos)