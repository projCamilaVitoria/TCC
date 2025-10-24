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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Coleta em Andamento - NERA</title>
  <link rel="stylesheet" href="../assets/CSS/Status.css" />
  <link rel="stylesheet" href="../assets/CSS/global.css">
    <link href="https://fonts.googleapis.com/css2?family=Passion+One&display=swap" rel="stylesheet">
</head>
<body>
  <div class="background">
 <!-- LOGO NERA -->

<div class="logo-container">
  <a href="home.php">
    <img src="../assets/Images/NERA.png" alt="Logo NERA" class="logo-nera">
  </a>
</div>

    <div class="card detalhes">
      <h2>Detalhes da coleta</h2>
      <p><strong>Hora agendada:</strong> ...</p>
      <p><strong>Materiais:</strong> ...</p>
      <p><strong>Quantidade:</strong> ...</p>
      <p><strong>Endereço:</strong> ...</p>
    </div>

    <div class="dropdown">
      <button class="dropdown-btn">Status da coleta <span class="arrow">▼</span></button>
      <div class="dropdown-content">
        <p>Aguardando coleta...</p>
      </div>
    </div>

    <div class="dropdown">
      <button class="dropdown-btn">Informações do coletor <span class="arrow">▼</span></button>
      <div class="dropdown-content">
        <p>Nome: ...</p>
        <p>Contato: ...</p>
      </div>
    </div>

    <button class="cancelar-btn">Cancelar coleta</button>
  </div>

  <script src="../js/Status.js"></script>
</body>
</html>
