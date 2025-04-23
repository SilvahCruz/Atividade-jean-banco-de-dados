<?php

require '../model/CadastroModel.php';
if ($_POST){
    $fullname = $_POST['fullname'];
    $senha = $_POST['senha'];
    $mail = $_POST['mail'];
 
    $result = register($fullname, $senha, $mail);

    echo $result;
 
    if ($result) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Cadastro não completo.";
    }
}