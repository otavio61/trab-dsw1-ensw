<?php if(isset($_SESSION['usuario'])) header("Location: inicio.php");?>
<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>Login | BAT Banco de questões</title>
    </head>

    <body class="container">
        <form action="logon.php" method="POST">
            <div class="mb-3">
                <label for="emailId" class="form-label">Endereço de email</label>
                <input type="email" class="form-control" id="emailId" name="email" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Não compartilhamos seu email com ninguém.</div>
            </div>

            <div class="mb-3">
                <label for="senhaId" class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" id="senhaId">
            </div>

            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Acessar</button>

            <p class="text-start"><a href="#" class="text-decoration-none">Primeiro Acesso?</a></p>

        </form>
    </body>

</html>