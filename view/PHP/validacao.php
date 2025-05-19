<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>validação Atividade Jean</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='../CSS/validacao.css'>
    <script src='../JS/validacao.js'></script>
</head>

<body>
        <div class="container">
            <h1>Atividade Jean</h1>
            <form class="formulario" action="index.html" method="post" Action="../../controller/FuncaoDeValidacaoController.php">
                <div class="cubo">
                    <input type="text" id="cod" name="cod" required><br><br>
                    <input type="text" id="cod2" name="cod" required>
                    <input type="text" id="cod3" name="cod" required><br><br>
                    <input type="text" id="cod4" name="cod" required>
                    <input type="text" id="cod5" name="cod" required><br><br>
                    <input type="text" id="cod6" name="cod" required>
                </div>
                <div>
                    <input type="button" value="Validar" id="botao">
                </div>
            </form> 
        </div>
</body>

</html>