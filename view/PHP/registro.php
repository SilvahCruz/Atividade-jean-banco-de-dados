<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registro Atividade Jean</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/style.css'>
    <script src='registro.js'></script>
</head>
<body>
    
        <div class="container">
            <h1>Atividade Jean</h1>
        <form id="form" action="../../controller/CadastroController.php" method="POST">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="fullname" required><br><br>
                <label for="email">Senha:</label>
                <input type="number" id="email" name="senha" required><br><br>
                <label for="name">Email:</label>
                <input type="email" id="email" name="mail" required>
                <div class="divcheck">
                    <input type="checkbox" id="checkbox" name="check" value="checkbox">
                </div>
                <p>Relembre-me</p>
                <button type="submit" value="Registrar" name="logar" id="botao">registrar</button>
        </div>  

        </form>
</body>

</html>