<?php
    // require_once '../config/Conexao.php';

    class QuestoesDAO{
        private PDO $conexao;

        public function __construct() {
            $this->conexao = Conexao::criarConexao();
        }

        public function obterQuestoes(){
            // SELECT q.id, q.enunciado, q.valor_questao, m.nome AS materia FROM questao q INNER JOIN materia m ON q.materia = m.id ORDER BY q.id DESC;
            $statement = $this->conexao->prepare('SELECT q.id, q.enunciado, a.descricao, a.resposta_correta FROM questao q INNER JOIN alternativa_questao a ON q.id = a.id_questao');
            $statement->execute();
            // $questoes = 


            return $statement->fetchAll();
        }
    }