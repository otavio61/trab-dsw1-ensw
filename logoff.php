<?php
    // precisa iniciar a sessão pra poder destruir (acho meio estranho você começar a sessão pra destruir, mas okay, PHP que decide kk)
    session_start();

    // Limpa todas as variáveis de sessão
    session_unset();
    session_destroy();

    header("Location: index.php");