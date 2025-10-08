<?php
require_once '../conexao.php';

$email = $_POST['login'];
$senha = $_POST['password'];

if (!empty($email) && !empty($senha)) {

    $queryLogin = "SELECT senha_user FROM tb_usuario WHERE email_user = ?";
    $stmtLogin = $conn->prepare($queryLogin);
    $stmtLogin->bind_param("s", $email);
    $stmtLogin->execute();
    $resultLogin = $stmtLogin->get_result();

    if ($resultLogin->num_rows > 0) {
        $hash = $resultLogin->fetch_assoc();
        $senhaHash = $hash['senha_user'];

        if (password_verify($senha, $senhaHash)) {
            session_start();
            $_SESSION['id'] = $dados['id_user'];
            $_SESSION['login'] = $email;
            
            echo "<script>alert('Logado com sucesso!')</script>";
            echo "<script>window.location.href = '../screens/home.html'</script>";
            exit();
        } else {
            echo "<script>alert('Usuário ou senha incorretos. Tente novamente.')</script>";
            echo "<script>window.location.href = '../screens/login.html'</script>";
            exit();
        }
    } else {
        echo "<script>alert('Usuário ou senha incorretos. Tente novamente.')</script>";
        echo "<script>window.location.href = '../screens/login.html'</script>";
        exit();
    }
}