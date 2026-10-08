<?php

class Conexao{

    public static function criarConexao(): ?PDO{
        try{
            return new PDO("mysql:host=localhost;port=3306;dbname=bancobat", "root", "");
        }catch(PDOException $e){
            echo "Ocorreu um erro ao tentar conectar ao banco de dados: " . $e->getMessage();
            return null;
        }
    }
}