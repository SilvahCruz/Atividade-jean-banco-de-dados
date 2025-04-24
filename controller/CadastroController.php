<?php

require '../model/CadastroModel.php';
if ($_POST){
    $fullname = $_POST['fullname'];
    $CPF = $_POST['CPF'];
    $endereco = $_POST['endereco'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

 
    $result = register($fullname, $senha, $email, $CPF, $endereco);

    echo $result;
 
    if ($result) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Cadastro não completo.";
    }
}