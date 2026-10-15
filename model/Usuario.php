<?php

    require_once "Conexao.php";

    class Usuario{
        
        public function __construct(
            private $id,
            private $nome,
            private $dataNascimento,
            private $email,
            private $senha,
            private $tipoUsuario
        ) {}

    }