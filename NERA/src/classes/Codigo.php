<?php
require_once __DIR__ . '/../../config/config.php';

class Codigo
{
    protected $conn;
    
    public function __construct()
    {
        require_once __DIR__ . '/../../config/conexao.php';
        $this->conn = $conn;
    }
    
    public function gerarCodigo(): string
    {
        $codigo = mt_rand(100000, 999999);
        return $codigo;
    }

    public function hashCodigoColeta(): string
    {
        $codigo = $this->gerarCodigo();

        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $hash = openssl_encrypt($codigo, 'aes-256-cbc', SECRET_KEY, 0, $iv);
        $codigoBase64 = base64_encode($iv . $hash);

        return $codigoBase64;
    }

    public function decodificarHashCodigo($hashCodigo): string
    {
        $hashDecoded64 = base64_decode($hashCodigo);
        $iv = substr($hashDecoded64, 0, openssl_cipher_iv_length('aes-256-cbc'));
        $hash = substr($hashDecoded64, openssl_cipher_iv_length('aes-256-cbc'));
        $codigo = openssl_decrypt($hash, 'aes-256-cbc', SECRET_KEY, 0, $iv);

        return $codigo;
    }

    public function verificarCodigo($codigo): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $idColeta = "SELECT id_coleta FROM tb_usuario_coleta WHERE codigo_coleta = ?";

        $stmtIdColeta = $this->conn->prepare($idColeta);
        $stmtIdColeta->bind_param("s", $codigo);
        $stmtIdColeta->execute();
        
        $resultIdColeta = $stmtIdColeta->get_result();
        $stmtIdColeta->close();

        if ($resultIdColeta->num_rows > 0) {
            return true;
        }

        return false;
    }
}