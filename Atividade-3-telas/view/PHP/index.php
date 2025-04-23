<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> Login Atividade Jean</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/style.css'>
    <script src='index.js'></script>
</head>
<body>
        <div class="container">
            <h1>Atividade Jean</h1>
        <form id="form" action="/controller/CadastroController.php" method="POST">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">Senha:</label>
                <input type="number" id="email" name="email" required>
                <div class="divcheck">
                    <input type="checkbox" id="checkbox" name="checkbox" value="checkbox">
                </div>
                <p class="relembrar">Relembre-me</p>
                <a href="email.php" target="_self" id="esqueci">esqueceu a senha?</a>
                <a href="./registro.php">Registrar-se</a>
                <input type="submit" value="Logar" id="botao" >
        </div>  

        </form>
</body>

</html>