<?php
    class Usuario{
        
        public function __construct(
            public int $id,   
            public string $nome,
            public string $dataNascimento,
            public string $email,
            public string $senha,
            public int $tipoUsuario
        ) {}
    }