<?php
    // require_once '../config/Conexao.php';

    class QuestoesDAO{
        private PDO $conexao;

        public function __construct() {
            $this->conexao = Conexao::criarConexao();
        }

        public function obterQuestoes(){
            $statement = $this->conexao->prepare('SELECT q.id, q.enunciado, a.descricao, a.resposta_correta FROM questao q INNER JOIN alternativa_questao a ON q.id = a.id_questao');
            $statement->execute();

            return $statement->fetchAll();
        }
    }