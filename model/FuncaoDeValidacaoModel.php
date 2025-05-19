<?php

session_start();
require_once '../service/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $codigo = $_POST['code'] ?? '';

    if ($email && $codigo) {
        $conn = new usePDO(); 
        $instance = $conn->getInstance();

        // Busca o código mais recente para o email
        $sql = "SELECT code FROM code WHERE email = ? ORDER BY id DESC LIMIT 1";
        $stmt = $instance->prepare($sql);
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && $row['code'] == $codigo) {
            // Código válido, redireciona
            $_SESSION['email_validado'] = $email; // Pode usar para manter a sessão
            header('Location: ../view/PHP/recuperacao.php');
            exit;
        } else {
            $erro = "Código inválido.";
        }
    } else {
        $erro = "Preencha todos os campos.";
    }
}
?>