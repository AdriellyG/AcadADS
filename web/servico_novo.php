<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro serviço</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>
    <div class="container">
        <h3>Cadastro serviço</h3>
        <form action="cad_servico.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input name="descricao" id="descricao" type="text" class="validate" required="true">
                    <label class="active" for="descricao">Descrição:</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
        </form>
    </div>
</body>
</html>
<?php
    require_once "funcoes/funcoes_db.php";
    $descricao = $_POST['descricao'];

    $objConn = retornaConexao();

    $sql_insert = "insert into servico(ser_descricaoservico)
                    values($descricao)";

    if($rs = $objConn->Execute($sql_insert))
    {
        die('<div class="row">' .
                '<div class="col s12 m5">' .
                    '<div class="card-panel teal">' .
                        '<span class="white-text">Inserido com sucesso!</span>' .
                    '</div>' .
                '</div>' .
            '</div>');
    }
?>