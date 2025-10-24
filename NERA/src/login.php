<?php
require_once '../config/conexao.php';

$email = $_POST['login'];
$senha = $_POST['password'];

if (!empty($email) && !empty($senha)) {

    $queryLogin = "SELECT id_user, nome_user, senha_user FROM tb_usuario WHERE email_user = ?";
    $stmtLogin = $conn->prepare($queryLogin);
    $stmtLogin->bind_param("s", $email);
    $stmtLogin->execute();
    $resultLogin = $stmtLogin->get_result();

    if ($resultLogin->num_rows > 0) {
        $dados = $resultLogin->fetch_assoc();
        $senhaHash = $dados['senha_user'];

        if (password_verify($senha, $senhaHash)) {
            session_start();
            $_SESSION['id'] = $dados['id_user'];
            $_SESSION['login'] = $email;
            $_SESSION['nome'] = $dados['nome_user'];
            
            echo "<script>alert('Logado com sucesso!')</script>";
            echo "<script>window.location.href = '../screens/home.php'</script>";
            exit();
        } else {
            echo "<script>alert('Usuário ou senha incorretos. Tente novamente.')</script>";
            echo "<script>window.location.href = '../screens/login.php'</script>";
            exit();
        }
    } else {
        echo "<script>alert('Usuário ou senha incorretos. Tente novamente.')</script>";
        echo "<script>window.location.href = '../screens/login.php'</script>";
        exit();
    }

} else {
    echo "<script>alert('Preencha todos os campos.')</script>";
    echo "<script>window.location.href = '../screens/login.php'</script>";
    exit();
}

?>