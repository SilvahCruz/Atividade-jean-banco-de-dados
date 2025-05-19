<?php 

require_once '../service/conexao.php';

function autenticarUsuario($CPF, $senha) {
    $conn = new usePDO(); 
    $instance = $conn->getInstance(); 

    $sql = "SELECT u.senha, u.id_usuario, p.nome FROM usuario u
            INNER JOIN pessoa p ON p.FK_usuario = u.id_usuario
            WHERE p.CPF = ?";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$CPF]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($senha, $user['senha'])) {
        return $user;
    }   

    return false;
}

function recuperacao($email) {
    
    $conn = new usePDO(); 
    $instance = $conn->getInstance();
    $code = rand(100000, 999999); 
    

    $sql = "INSERT INTO code (nome, code, email) VALUES (?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$email, $code, $email]);

    return false;
}
