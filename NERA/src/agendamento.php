<?php
require_once '../config/conexao.php';
require_once 'classes/Login.php';
require_once 'classes/Codigo.php';

session_start();

$login = new Login();
$codigo = new Codigo();

if (!$login->verificarLogin()) {
    echo "<script>alert('É necessário logar para acessar o sistema.')</script>";
    echo "<script>window.location.href = '../index.php'</script>";
    exit();
}

$hashCode = $codigo->hashCodigoColeta();
$type_material = ucfirst(trim($_POST['type_material']));
$quantidade = trim($_POST['quantidade']);
$date = $_POST['date'];
$time = $_POST['time'];
$adress = ucfirst(trim($_POST['adress']));
$status = 'pendente';

$queryAgendamento = "INSERT INTO tb_coleta (tipo_coleta, quantidade_coleta, data_coleta, hora_coleta, endereco_coleta, status_coleta) VALUES (?, ?, ?, ?, ?, ?)";
$stmtAgendamento = $conn->prepare($queryAgendamento);
$stmtAgendamento->bind_param("sissss", $type_material, $quantidade, $date, $time, $adress, $status);
$stmtAgendamento->execute();

$id_coleta = $conn->insert_id;

$stmtAgendamento->close();

$queryUsuarioColeta = "INSERT INTO tb_usuario_coleta (id_coleta, id_user, codigo_coleta) VALUES (?, ?, ?)";
$stmtUsuarioColeta = $conn->prepare($queryUsuarioColeta);
$stmtUsuarioColeta->bind_param("iis", $id_coleta, $_SESSION['id'], $hashCode);
$stmtUsuarioColeta->execute();
$stmtUsuarioColeta->close();

echo "<script>alert('Agendamento realizado com sucesso')</script>";
echo "<script>window.location.href = '../screens/home.php'</script>";
exit();

?>