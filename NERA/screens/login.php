<?php
require_once '../src/classes/Login.php';

$login = new Login();
$login->logout();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/CSS/login.css">
    <script src="../js/buttons.js"></script>
</head>
<body>
    <header>
        <img src="../assets/Images/icon.png" alt="Ícone" class="icon">
        <h1 class="titulo">Login</h1>
    </header>
    <main>
        <div class="container">
            <form method="post" action="../src/login.php">
                <input type="text" name="login" id="login" placeholder="Digite seu email" required>
                <input type="password" name="password" id="password" placeholder="Digite sua senha" required>

                <div class="row">
                    <a href="" class="esqueciAsenha">Esqueci a senha</a>
                    <button type="submit" class="btn_1" onclick="clickEntrar()">Entrar</button>
                </div>
                <button class="btn_google" onclick="clickEntrarGoogle()">Entrar com Google</button>
                <button class="btn_2" onclick="clickCadastre_se()">Cadastre-se</button>
            </form>
        </div>
    </main>
</body>
</html>
