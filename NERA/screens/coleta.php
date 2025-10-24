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
  <title>Coleta - NERA</title>
  <link rel="stylesheet" href="../assets/CSS/Coleta.css" />
  <link rel="stylesheet" href="../assets/CSS/global.css">
  <link href="https://fonts.googleapis.com/css2?family=Passion+One&display=swap" rel="stylesheet">
</head>
<body>
 

    <div class="logo-container">
        <a href="home.php">
          <img src="../assets/Images/NERA.png" alt="Logo NERA" class="logo-nera" >
        </a>
      </div>

   

    <div class="carousel-container">
        <button class="arrow left" onclick="prevSlide()">&#10094;</button>
      
        <div class="carousel">
          <div class="card active"  onclick="window.location.href='../screens/historico.php'">
            <img src="../assets/Images/Hitorico.png" alt="Histórico de Coleta" class="Icon" />
      
            <p>Selecione para ter acesso ao seu histórico de coleta</p>
          </div>
      
          <div class="card"  onclick="window.location.href='../screens/pontos_coleta.php'">
            <img src="../assets/Images/Pontos.png" alt="Pontos de Coleta" class="Icon" />
   
            <p>Selecione para visualizar pontos de coleta próximos de você</p>
          </div>
      
          <div class="card"  onclick="window.location.href='../screens/coletor.php'">
            <img src="../assets/Images/Coletor.png" alt="Tornar Coletor" class="Icon" />
   
            <p>Selecione para se tornar um coletor</p>
          </div>
      
          <div class="card"  onclick="window.location.href='../screens/status.php'">
            <img src="../assets/Images/Status.png" alt="Status de Coleta" class="Icon" />
        
            <p>Selecione para visualizar os status de coleta</p>
          </div>
        </div>
      
        <button class="arrow right" onclick="nextSlide()">&#10095;</button>
      </div>
      
  <script src="../js/Coleta.js"></script>
</body>
</html>
