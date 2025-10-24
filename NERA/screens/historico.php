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
    <link href="https://fonts.googleapis.com/css2?family=Passion+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/CSS/Historico.css">
    <link rel="stylesheet" href="../assets/CSS/global.css">
    <title>Historico</title>
</head>
<body>

  <!-- LOGO NERA -->

<div class="logo-container">
  <a href="home.php">
    <img src="../assets/Images/NERA.png" alt="Logo NERA" class="logo-nera">
  </a>
</div>
  <h2>Historico de Coleta</h2>
  <br>
  <br>


   <div class="card">
    <h2>Dados de coletas anteriores</h2>
    <div class="info-box"></div>
    <div class="info-box"></div>
  </div>
<br>
<br>
  <div class="card">
    <h2>Coletores responsáveis</h2>
    <div class="coletor-row">
      <span>Nome</span>
      <span>📅</span>
    </div>
<br>

    <div class="coletor-row">
      <span>Nome</span>
      <span>📅</span>
    </div>
  </div>
<br>
<br>
  <div class="search-container">
    <input type="text" class="search-input" placeholder="Pesquisar coleta">

    
  </div>

<br>
<br>

<div class="botao-container">
  <button type="submit">Confirmar</button>
</div>

</body>
</html>