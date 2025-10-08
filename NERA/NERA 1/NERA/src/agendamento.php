<?php
require_once '../conexao.php';

session_start();

if(!isset($_SESSION['id'])){
    echo "<script>alert('Faça login para utilizar à platafroma')</script>";
    echo "<script> window.location.href = '../screens/index.html'</script>";
    exit();
};

$type_material = $_POST['type_material'];
$quantidade = $_POST['quantidade'];
$date = $_POST['date'];
$time = $_POST['time'];
$adress = $_POST['adress'];

$queryAgendamento = "INSERT INTO tb_coleta (tipo_coleta, quantidade_coleta, data_coleta, hora_coleta, endereco_coleta) VALUES (?, ?, ?, ?, ?)";
$stmtAgendamento = $conn->prepare($queryAgendamento);
$stmtAgendamento->bind_param("sssss", $type_material, $quantidade, $date, $time, $adress);
$stmtAgendamento->execute();
$stmtAgendamento->close();

echo "<script>alert('Agendamento realizado com sucesso')</script>";
echo "<script>window.location.href = '../screens/home.html'</script>";
exit();

?>