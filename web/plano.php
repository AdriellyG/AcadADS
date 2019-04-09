<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro plano</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>
    <div class="container">
        <h3>Cadastro</h3>
        <form action="plano.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input name="dt_venc" id="dt_venc" type="text" class="validate" required="true">
                    <label class="active" for="dt_venc">Data vencimento:</label>
                </div>
                <div class="input-field col s6">
                    <input name="cliente" id="cliente" type="text" class="validate" required="true">
                    <label class="active" for="cliente">Cliente:</label>
                </div>
                <div class="input-field col s6">
                    <input name="servico" id="servico" type="text" class="validate" required="true">
                    <label class="active" for="servico">Serviço:</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
        </form>
    </div>
</body>
</html>

<?php
    require_once "funcoes/funcoes_db.php";
    $dt_venc = $_POST['dt_venc'];
    $cliente = $_POST['cliente'];
    $servico = $_POST['servico'];

    $objConn = retornaConexao();

    $sql_insert = "insert into plano(pla_datavencimento, cli_codigo, ser_codigo)
                    values($dt_venc, $cliente, $servico)";

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