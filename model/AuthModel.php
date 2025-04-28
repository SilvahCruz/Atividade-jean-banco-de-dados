<?php

require '../service/conexao.php';
 
function get( $CPF, $senha){
    $conn = new usePDO; //obrigatorio
    $instance = $conn->getInstance(); //obrigatorio
 

    //criptografar a senha
    $hashed_password = password_hash($senha, PASSWORD_DEFAULT);
 
    //cadastro usuário
    $sql = "SELECT usuario (senha) VALUES (?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$hashed_password]);
   $idUsuario = $instance->lastInsertID();


  //cadastro pessoa
    $sql = "SELECT pessoa (CPF) VALUES (?)";
    $stmt = $instance->prepare($sql);
    $stmt->execute([$CPF, $idUsuario]);


    return $CPF;
}