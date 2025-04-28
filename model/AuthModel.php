<?php

function get($CPF, $senha) {
    $conn = new usePDO; 
    $instance = $conn->getInstance(); 

    $sql = "SELECT u.senha FROM usuarios u
            INNER JOIN pessoas p ON p.id = u.id_pessoa
            WHERE p.CPF = ?";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$CPF]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user) {
        if (password_verify($senha, $user['senha'])) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}