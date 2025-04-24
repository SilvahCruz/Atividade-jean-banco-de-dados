<?php

require '../service/conexao.php';
 
function register($fullname, $CPF, $endereco, $senha, $email){
    $conn = new usePDO; //obrigatorio
    $instance = $conn->getInstance(); //obrigatorio
 
    //cadastro pessoa
    $sql = "INSERT INTO pessoa (nome, CPF, endereco) VALUES (?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$fullname, $CPF, $endereco]);

    //criptografar a senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
 
    //cadastro usuário
    $idUsuario = $instance->lastInsertID();
    $sql = "INSERT INTO usuario (nome, senha, email) VALUES (?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$fullname, $hashed_password, $email]);
    return $idUsuario;
}