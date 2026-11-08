<?php
    require_once '../config/Conexao.php';
    require_once 'VO/Usuario.php';

    class UsuarioDAO {

        private PDO $conexao;

        public function __construct() {
            $this->conexao = Conexao::criarConexao();
        }

        public function obterUsuario(string $email, string $senha): Usuario|false {
            $statement = $this->conexao->prepare('SELECT * FROM usuario WHERE email = :email AND senha = :senha');
            $statement->bindParam(':email', $email);
            $statement->bindParam(':senha', $senha);
            $statement->execute();

            return $statement->fetchObject(Usuario::class);
        }

        public function registrarUsuario() {

        }
    }