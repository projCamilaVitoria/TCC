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
    <title>Pontos de Coleta</title>
    <link rel="preconnect" hr="https://fonts.googleapis.com">
    <link rel="preconnect" href="httefps://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passion+One:wght@400;700;900&display=swap" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBxcTzKl1zFWzKd7A2yp5FyQS8UrL7Y3Lg&callback=initMap" async defer></script>
    <script src="../js/maps.js"></script>
    <link rel="stylesheet" href="../assets/CSS/pontos_coleta.css">
    <link rel="stylesheet" href="../assets/CSS/global.css">
</head>
<body>

  <!-- LOGO NERA -->

<div class="logo-container">
  <a href="home.php">
    <img src="../assets/Images/NERA.png" alt="Logo NERA" class="logo-nera">
  </a>
</div>
    <h2>Pontos de Coleta</h2>

<br>
<br>

    <!-- Formulário -->
    <form class="form-pontos-coleta" method="post">
    
        <!-- Cidade -->
        <div class="campo">
            <select name="cidade" id="cidade" onchange="buscarCidade()">
                <option disabled selected>Cidade</option>
                <option value="DI">Diadema</option>
                <option value="MA">Mauá</option>
                <option value="RP">Ribeirão Pires</option>
                <option value="RG">Rio Grande da Serra</option>
                <option value="SA">Santo André</option>
                <option value="SB">São Bernardo do Campo</option>
                <option value="SC">São Caetano do Sul</option>
            </select>
        </div>

        <br>

        <div class="map_container">
            <div class="map" id="map"></div>
        </div>

        <br>

        <!-- Localização -->
        <div class="campo">
            <select name="location">
                <option disabled selected>Localização de pontos</option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>

        <br>

        <!-- Filtro -->
        <div class="campo">
            <select name="filter">
                <option disabled selected>Filtro por tipo</option>
                <option value="papel">Papel</option>
                <option value="plastico">Plástico</option>
                <option value="vidro">Vidro</option>
                <option value="metal">Metal</option>
            </select>
        </div>

        <br>

        <!-- Endereço -->
        <div class="campo">
            <input type="text" name="adress" placeholder="Endereço" required>
        </div>

        <br>

        <!-- Botão -->
        <button type="submit">Confirmar</button>

    </form>

</body>
</html>