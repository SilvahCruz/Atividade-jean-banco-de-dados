<?php
session_start();
require_once '../model/AuthModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $CPF = $_POST['CPF'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuario = autenticarUsuario($CPF, $senha);

    if ($usuario) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['nome'] = $usuario['nome'];
        header('Location: ../PHP/tela-inicial.php');
        exit;
    } else {
        echo "<script>alert('CPF ou senha incorretos!'); window.location.href = '../PHP/index.php';</script>";
    }
}