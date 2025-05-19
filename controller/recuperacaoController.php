<?php

require_once '../model/AuthModel.php';

recuperacao($_POST["email"]);

$email = $_POST["email"];
$_SESSION['codigo_email'] = $email;
recuperacao($email);
header('Location: ../view/PHP/validacao.php');