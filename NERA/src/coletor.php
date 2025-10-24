<?php
require_once '../config/conexao.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (empty($_SESSION['coletor'])) {
    $cpfColetor = !empty($_POST['cpf']) ? $_POST['cpf'] : null;

    if (!empty($cpfColetor)) {
        $queryCpfColetor = "UPDATE tb_usuario SET cpf_user = (?) WHERE id_user = (?)";
        $stmtCpfColetor = $conn->prepare($queryCpfColetor);
        $stmtCpfColetor->bind_param("si", $cpfColetor, $_SESSION['id']);
        $stmtCpfColetor->execute();
        $stmtCpfColetor->close();

        echo "<script>alert('Bem-vindo novamente, coletor!')</script>";
        echo "<script>window.location.href = '../screens/perfil.php'</script>";
        exit();
    }

    echo "<script>alert('O CPF é necessário para se tornar um coletor.')</script>";
    echo "<script>window.location.href = '../screens/perfil.php'</script>";
    exit();
}

header("Location: '../screens/home.php'");
exit();