<?php
    require_once '../config/Conexao.php';
    require_once 'VO/Usuario.php';

    class UsuarioDAO {

        private PDO $conexao;

        public function __construct() {
            $this->conexao = Conexao::criarConexao();
        }

        public function obterUsuario(array $form): Usuario|false {
            $statement = $this->conexao->prepare('SELECT * FROM usuario WHERE email = :email');
            $statement->bindParam(':email', $form['email']);
            $statement->execute();
            
            $result = $statement->fetchObject(Usuario::class);

            return $result && password_verify($form['senha'], $result->senha) ? $result : false;
        }

        public function registrarUsuario(array $form): bool {
            $statement = $this->conexao->prepare('INSERT INTO usuario (nome, data_nascimento, email, senha, tipo_usuario) VALUES (:nome, :data_nascimento, :email, :senha, :tipo_usuario)');
            $statement->bindParam(':nome', $form['nome']);
            $statement->bindParam(':data_nascimento', $form['dataNascimento']);
            $statement->bindParam(':email', $form['email']);
            $hashSenha = password_hash($form['senha'], PASSWORD_DEFAULT);
            $statement->bindParam(':senha', $hashSenha); 
            $statement->bindParam(':tipo_usuario', $form['tipoUsuario']);
            $statement->execute();

            return $statement->rowCount() != 0;
        }
    }