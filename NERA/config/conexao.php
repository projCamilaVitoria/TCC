<?php

$servidor = "localhost";
$usuario  = "root";
$senha    = "dimebag1966";
$banco    = "bd_nera";

$conn = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
