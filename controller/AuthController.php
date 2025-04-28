<?php

require '../model/AuthModel.php';

if ($_POST){
    $CPF = $_POST['CPF'];
    $senha = $_POST['senha'];
   

 
    $result = get($CPF, $senha);

 
    if ($result) {
        echo "Login realizado com sucesso!";
    } else {
        echo "Algum dado não é coerente.";
    }
}