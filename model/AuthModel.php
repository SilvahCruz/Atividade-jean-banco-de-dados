<?php

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

// Conectar ao banco de dados
$pdo = new PDO('mysql:host=localhost;dbname=atividade_jean', 'CPF', 'senha');

// Pegar os dados de entrada
$CPF = $_POST['CPF'];
$senha = $_POST['senha'];

// Buscar a pessoa no banco de dados
$stmt = $pdo->prepare("SELECT * FROM pessoa WHERE CPF = ?");
$stmt->execute([$CPF]);
$CPF = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar se o usuário existe e se a senha está correta
if ($user && password_verify($CPF, $senha['senha'])) {
    // A senha está correta
    echo "Login bem-sucedido!";
    // Aqui eu posso iniciar uma sessão ou redirecionar um usuário
    session_start();
    $_SESSION['user_id'] = $idUsuario['id_usuario'];
    $_SESSION['username'] = $username['username'];
    header('Location: ../tela-incial.php'); // Redireciona para uma página de usuário logado
} else {
    // Usuário ou senha inválidos
    echo "Usuário ou senha incorretos.";
}
