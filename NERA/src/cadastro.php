<?php
require_once '../conexao.php';

$nome = trim(ucfirst($_POST['name']));
$data = trim($_POST['date']);
$email = trim(strtolower($_POST['login']));
$senha = trim($_POST['password']);

if (strpos($email, " ") == true or strpos($senha, " ") == true) {
    echo "<script>alert('Os campos e-mail e senha não podem conter espaços em branco.')</script>";
    echo "<script>window.location.href = '../screens/cadastro.html'</script>";
    exit();
}

if (!empty($nome) && !empty($data) && !empty($email) && !empty($senha)) {
    $queryEmailEData = "SELECT * FROM tb_usuario WHERE email_user = ? OR datanascimento_user = ?";
    $stmtEmailEData = $conn->prepare($queryEmailEData);
    $stmtEmailEData->bind_param("ss", $email, $data);
    $stmtEmailEData->execute();
    $resultEmailEData = $stmtEmailEData->get_result();

    if ($resultEmailEData->num_rows > 0) {
        echo "<script>alert('E-mail/Telefone/CPF já cadastrado. Tente utilizar outro.')</script>";
        echo "<script>window.location.href = '../screens/cadastro.html'</script>";
        exit();
    }

    $hash = password_hash($senha, PASSWORD_DEFAULT);

    $queryCadastro = "INSERT INTO tb_usuario (nome_user, datanascimento_user, email_user, senha_user) VALUES (?, ?, ?, ?)";
    $stmtCadastro = $conn->prepare($queryCadastro);
    $stmtCadastro->bind_param("ssss", $nome, $data, $email, $hash);
    $stmtCadastro->execute();
    $stmtCadastro->close();

    echo "<script>alert('Cadastro realizado com sucesso!')</script>";
    echo "<script>window.location.href = '../screens/login.html'</script>";
    exit();
} else {
    echo "<script>alert('É necessário que todos os campos estejam preenchidos.')</script>";
    echo "<script>window.location.href = '../screens/cadastro.html'</script>";
    exit();
}