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
  <title>Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Passion+One:wght@400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../assets/CSS/global.css">
  <link rel="stylesheet" href="../assets/CSS/home.css">
  <script src="../js/buttons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

  <div class="top-bar-search">
    <input type="text" placeholder="Pesquise aqui" class="search-input">
    <button class="notif-btn">
      <img src="../assets/Images/notificaçao.png" alt="">
    </button>
  </div>

  <!-- Cards -->
  <div class="card-container">
    <div class="card">
      <img src="https://via.placeholder.com/150" alt="Imagem">
      <div class="card-title">Título</div>
    </div>
    <div class="card">
      <img src="https://via.placeholder.com/150" alt="Imagem">
      <div class="card-title">Título</div>
    </div>
    <div class="card">
      <img src="https://via.placeholder.com/150" alt="Imagem">
      <div class="card-title">Título</div>
    </div>
    <div class="card">
      <img src="https://via.placeholder.com/150" alt="Imagem">
      <div class="card-title">Título</div>
    </div>
  </div>

  <!-- Menu Inferior -->
  <footer>
    <div class="navigation">
      <ul>
            <!-- Botão central -->
            <li class="plus">
              <a href="#">
                <span class="icon" onclick="window.location.href='agendamento.php'"><i class="fas fa-plus"></i></span> 
              </a>
            </li>
      
        <li class="active">
          <a href="#">
            <span class="icon" onclick="window.location.href='home.php'"><i class="fas fa-home"></i></span>
            <span class="text">Home</span>
          
          </a>
        </li>
        <li>
          <a href="#">
            <span class="icon"onclick="window.location.href='perfil.php'"><i class="fas fa-user"></i></span>
            <span class="text">Perfil</span>
          </a>
        </li>
    
        <li>
          <a href="#">
            <span class="icon"onclick="window.location.href='coleta.php'"><i class="fas fa-trash"></i></i></span>
            <span class="text">Coleta</span>
          </a>
        </li>
    
      </ul>
      <div class="indicator"></div>
    </div>
  </footer>

  <script>
    const list = document.querySelectorAll('.navigation ul li');
    function activeLink() {
      list.forEach((item) => item.classList.remove('active'));
      this.classList.add('active');
    }
    list.forEach((item) => item.addEventListener('click', activeLink));
  </script>

</body>
</html>
