<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="container-foto">
            <img class="logo" src="images/LogoAPSM.png" alt="logo">
        </div>
        <div class="container-login">
            <form action="code.php" method="POST">
                <h1 class="titulo-login">LOGIN</h1>
                <p class="text-user"><b>Email</b></p>
                <input class="input-user" required type="email" name="email" size="50" placeholder="Digite seu e-mail">
                <p class="text-user"><b>Senha</b></p>
                <input class="input-password" required type="password" name="senha" size="50" placeholder="Digite sua senha">
                <?php include 'message.php'; ?>
                <div class="container-botao">
                    <div class="botao-voltar">
                        <a href="../Cliente/index.php"><button class="voltar" type="button">Voltar</button></a>
                        <div class="botao-entrar">
                            <button type="submit" class="adicionar" name="login">Entrar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>