<?php

require '../model/AuthModel.php';

if ($_POST){
    $CPF = $_POST['CPF'];
    $senha = $_POST['senha'];
   

 
    $result = register($CPF, $senha);

    echo $result;
 
    if ($result) {
        echo "Login realizado com sucesso!";
    } else {
        echo "Algum dado não é coerente.";
    }
}