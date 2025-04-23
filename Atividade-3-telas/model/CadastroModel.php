<?php

require '../service/conexao.php';
 
function register($fullname, $senha, $mail){
    $conn = new usePDO; //obrigatorio
    $instance = $conn->getInstance(); //obrigatorio
 
    //criptografa a senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
 
    $sql = "INSERT INTO usuario (nome, senha, email) VALUES (?, ?, ?)";
 
    $stmt = $instance->prepare($sql);
    $stmt->execute([$fullname, $senha, $mail]);
 
    $result = $stmt->rowCount();
    return $result;
}