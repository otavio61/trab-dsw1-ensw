<?php
    require_once '../config/Conexao.php';

    class QuestaoDAO{
        private PDO $conexao;

        public function __construct() {
            $this->conexao = Conexao::criarConexao();
        }

        public function obterQuestoes(): array {
            require_once 'VO/Questao.php';

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

        public function adicionarQuestao($form): bool {
            $statement = $this->conexao->prepare('INSERT INTO questao (enunciado, valor_questao, materia) VALUES (:enunciado, :valor_questao, :materia)');
            $statement->bindParam(':enunciado', $form['enunciado']);
            $statement->bindParam(':valor_questao', $form['valorQuestao']);
            $statement->bindParam(':materia', $form['materia']);
            $statement->execute();

            return $statement->rowCount() != 0;
        }

        public function obterMaterias(): array {
            $statement = $this->conexao->prepare('SELECT * FROM materia ORDER BY id DESC');
            $statement->execute();

            return $statement->fetchAll();
        }
    }