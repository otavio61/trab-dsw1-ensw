<?php
    include "conexao.php"; 

    $conn = Conexao::criarConexao();

    if($conn == null) exit;

    $statement = $conn->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
    $statement->bindParam(":email", $_POST['email']);
    $statement->bindParam(":senha", $_POST['senha']);

    $statement->execute();
    
    if($usuario = $statement->fetch(PDO::FETCH_ASSOC)){
        echo $usuario['nome_completo'];
        echo "\n" . $usuario['data_nascimento'];
    }


    // '->' é usado para contextos de objeto, enquanto '::' é usado para contextos de classe. 
    // (use '::' para acessar métodos estáticos de uma classe, e '->' para acessar métodos de instâncias de objetos)