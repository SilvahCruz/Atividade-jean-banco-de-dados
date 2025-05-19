<?php

session_start();
require_once '../model/AuthModel.php';
require_once '../service/conexao.php';

// Verifica se o código foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['codigo'])) {
    $codigoInformado = $_POST['codigo'];
    $email = $_SESSION['codigo_email'] ?? null;

    if (!$email) {
        $_SESSION['mensagem'] = "Sessão expirada ou email não informado!";
        header("Location: ../view/PHP/validacao.php");
        exit();
    }

    try {
        $conn = new usePDO();
        $instance = $conn->getInstance();

        $sql = "SELECT * FROM code WHERE code = ? AND email = ? ORDER BY id_code DESC LIMIT 1";
        $stmt = $instance->prepare($sql);
        $stmt->execute([$codigoInformado, $email]);
        $codigoDB = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($codigoDB) {
            // Código válido
            $_SESSION['codigo_validado'] = true;
            header("Location: ../view/PHP/recuperacao.php"); 
            exit();
        } else {
            $_SESSION['mensagem'] = "Código inválido!";
            header("Location: ../view/PHP/validacao.php");
            exit();
        }

    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao validar o código: " . $e->getMessage();
        header("Location: ../view/PHP/validacao.php");
        exit();
    }

} else {
    $_SESSION['mensagem'] = "Código não fornecido!";
    header("Location: ../view/PHP/validacao.php");
    exit();
}