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
    <title>Agendamento de Coleta</title>
    <link rel="preconnect" hr="https://fonts.googleapis.com">
    <link rel="preconnect" href="httefps://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Passion+One:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/CSS/agendamento.css">
    <link rel="stylesheet" href="../assets/CSS/global.css">
</head>
<body>

 <!-- LOGO NERA -->

<div class="logo-container">
  <a href="home.php">
    <img src="../assets/Images/NERA.png" alt="Logo NERA" class="logo-nera">
  </a>
</div>
    <h2>Agendamento de Coleta</h2>

<br>
<br>

    <!-- Formulário -->
    <form class="form-agendamento" action="../src/agendamento.php" method="post">
    
        <!-- Tipo de material -->
        <div class="campo">
            <select name="type_material">
                <option disabled selected>Tipo de material</option>
                <option value="papel">Papel</option>
                <option value="plastico">Plástico</option>
                <option value="vidro">Vidro</option>
                <option value="metal">Metal</option>
            </select>
        </div>

        <br>

        <div class="campo">
            <input type="number" name="quantidade" placeholder="Quantidade(KGs)" required>
        </div>

        <br>

        <!-- Data -->
        <div class="campo">
            <input type="date" name="date" placeholder="Data" required>
        </div>

        <br>

        <!-- Horário -->
        <div class="campo">
            <input type="time" name="time" placeholder="Horário" required> 
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