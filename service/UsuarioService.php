<?php
    require_once "../config/Conexao.php";
    require_once "../model/Usuario.php";

    class UsuarioService {

        private PDO $conexao;

        public function __construct() {
            $this->conexao = Conexao::criarConexao();
        }

        public function obterUsuario(string $email, string $senha): object|false {
            $statement = $this->conexao->prepare("SELECT * FROM usuario WHERE email = :email AND senha = :senha");
            $statement->bindParam(":email", $email);
            $statement->bindParam(":senha", $senha);
            $statement->execute();

            $result = $statement->fetchObject();
            return $result ?: false; // equivalente a return $result ? $result : false

            // return new Usuario($result->id, $result->nome, $result->dataNascimento, $result->email, $result->senha, $result->tipoUsuario);
        }

        public function registrarUsuario() {

        }
    }