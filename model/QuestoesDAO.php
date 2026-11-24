<?php
    require_once '../config/Conexao.php';
    require_once 'VO/Questao.php';

    class QuestoesDAO{
        private PDO $conexao;

        public function __construct() {
            $this->conexao = Conexao::criarConexao();
        }

        public function obterQuestoes(){
            $statement = $this->conexao->prepare('SELECT q.id, q.enunciado, q.valor_questao, m.nome AS materia FROM questao q INNER JOIN materia m ON q.materia = m.id ORDER BY q.id DESC');
            $statement->execute();

            $arrayQuestoes = [];

            $count = 0;

            foreach ($statement->fetchAll() as $registroQuestao) {
                $statementAlternativas = $this->conexao->prepare('SELECT id, descricao, resposta_correta FROM alternativa_questao WHERE id_questao = :id');
                $statementAlternativas->bindParam(':id', $registroQuestao['id']);
                $statementAlternativas->execute();
                $alternativas = $statementAlternativas->fetchAll();    

                $questao = new Questao();
                $questao->id = $registroQuestao['id'];    
                $questao->enunciado = $registroQuestao['enunciado'];    
                $questao->valor_questao = $registroQuestao['valor_questao'];    
                $questao->materia = $registroQuestao['materia'];    
                $questao->alternativas = $alternativas;

                $arrayQuestoes[$count++] = $questao;
            }
            
            return $arrayQuestoes;
        }
    }