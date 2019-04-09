<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>

    <div class="container">
        <h3>Cadastro perfil</h3>
        <form action="cad_perfil.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input name="descricao" id="descricao" type="text" class="validate" required="true">
                    <label class="active" for="descricao">Descrição:</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
            <a href="perfil.php" class="btn waves-effect waves-light">Voltar</a>
        </form>
        <br><br>
    </div>
</body>
</html>