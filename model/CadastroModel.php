<?php 

require '../service/conexao.php';

function register($fullname, $CPF, $endereco, $senha, $email){
    $conn = new usePDO;
    $instance = $conn->getInstance();

    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

    //cadastro de usuario
    $sql = "INSERT INTO usuario (nome, senha, email) VALUES (?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$fullname, $hashed_password, $email]);
    $id_usuario = $instance->lastInsertId();

    //cadastro de pessoa
    $sql = "INSERT INTO pessoa (nome, CPF, endereco, FK_usuario) VALUES (?, ?, ?, ?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$fullname, $CPF, $endereco, $id_usuario]);

    return $id_usuario;
}