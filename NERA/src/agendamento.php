<?php
require_once '../conexao.php';

session_start();

$id = $_SESSION['id'];

if(!isset($id)){
    echo "<script>alert('Faça login para utilizar à plataforma')</script>";
    echo "<script> window.location.href = '../screens/index.html'</script>";
    exit();
}

function gerarCodigoUnico($conn) {
    do {
        $code = bin2hex(random_bytes(128)); 
        $query = "SELECT COUNT(*) FROM tb_coleta WHERE codigo_coleta = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $code);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
    } while ($count > 0);

    return $code;
}

$type_material = $_POST['type_material'];
$quantidade = $_POST['quantidade'];
$date = $_POST['date'];
$time = $_POST['time'];
$adress = $_POST['adress'];
$code = gerarCodigoUnico($conn);
$status = 'pendente';

$queryAgendamento = "INSERT INTO tb_coleta (tipo_coleta, quantidade_coleta, data_coleta, hora_coleta, endereco_coleta, codigo_coleta, status_coleta) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmtAgendamento = $conn->prepare($queryAgendamento);
$stmtAgendamento->bind_param("sisssss", $type_material, $quantidade, $date, $time, $adress, $code, $status);
$stmtAgendamento->execute();

$id_coleta = $conn->insert_id;

$stmtAgendamento->close();

$queryUsuarioColeta = "INSERT INTO tb_usuario_coleta (id_coleta, id_user) VALUES (?, ?)";
$stmtUsuarioColeta = $conn->prepare($queryUsuarioColeta);
$stmtUsuarioColeta->bind_param("ii", $id_coleta, $id);
$stmtUsuarioColeta->execute();
$stmtUsuarioColeta->close();

echo "<script>alert('Agendamento realizado com sucesso')</script>";
echo "<script>window.location.href = '../screens/home.html'</script>";
exit();

?>