<?php
require_once '../src/classes/Login.php';

$login = new Login();

if (!$login->verificarLogin()) {
    echo "<script>alert('É necessário logar para acessar o sistema.')</script>";
    echo "<script>window.location.href = '../index.php'</script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Termos de Uso - NERA</title>
  <link rel="stylesheet" href="../assets/CSS/Termos.css">
</head>
<body>

  <!-- Logo NERA -->
  <div class="logo-container">
    <a href="home.php">
      <img src="../assets/Images/NERA.png" alt="Logo NERA" class="logo-nera">
    </a>
  </div>

  <!-- Título -->
  <h1 class="titulo">Termos de Uso</h1>

  <!-- Card com texto -->
  <div class="card-termos">
    <p class="texto">
      Contrary to popular belief, Lorem Ipsum is not simply random text. 
      It has roots in a piece of classical Latin literature from 45 BC. 
      Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" 
      (The Extremes of Good and Evil) by Cicero, written in 45 BC. 
      This book is a treatise on the theory of ethics, very popular during the Renaissance.
    </p>
  </div>

  <!-- Checkbox e botão -->
  <div class="termos-form">
    <label class="aceitar">
      <input type="checkbox" id="checkTermos">
      Aceitar Termos
    </label>

    <button id="confirmar">Confirmar</button>
  </div>

  <script src="../js/Termos.js"></script>
</body>
</html>
