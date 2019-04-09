<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <?php include 'menu.html';?>
    <div class="container">
        <h3>Cadastro pessoa</h3>
        <br>        
        <form action="cad_pessoa.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input name="nome" id="nome" type="text" class="validate" required="true">
                    <label class="active" for="nome">Nome:</label>
                </div>
                <div class="input-field col s6">
                    <input name="cpf" id="cpf" type="text" class="validate" required="true">
                    <label class="active" for="cpf">CPF:</label>
                </div>
                <div class="input-field col s6">
                    <input name="rg" id="rg" type="text" class="validate" required="true">
                    <label class="active" for="rg">RG:</label>
                </div>
            </div>
            <br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
            <a class="btn waves-effect waves-light" href="pessoa.php">Voltar<i class="mdi-content-reply left"></i></a>
            <br><br>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        M.updateTextFields();
    });
    </script>
</body>
</html>