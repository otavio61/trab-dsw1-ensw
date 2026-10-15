<?php
    include "conexao.php"; 

    $conn = Conexao::criarConexao();

    if($conn == null) exit;

    $statement = $conn->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
    $statement->bindParam(":email", $_POST['email']);
    $statement->bindParam(":senha", $_POST['senha']);

    $statement->execute();
    
    if($usuario = $statement->fetchObject()){
        // echo "Nome: " . $usuario->
    }


    // '->' é usado para contextos de objeto, enquanto '::' é usado para contextos de classe. 
    // (use '::' para acessar métodos e atributos estáticos de uma classe, e '->' para acessar métodos e atributos de instâncias de objetos)