<?php
    // precisa iniciar a sessão pra poder destruir (acho meio estranho você começar a sessão pra destruir, mas okay, PHP que decide kk)
    session_start(); // O php precisa carregar a sessão salva na memória primeiro pra depois destruir

    // Limpa todas as variáveis de sessão
    $_SESSION = [];
    session_destroy();

    header("Location: ../");
    exit;