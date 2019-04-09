<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro pagamento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>

    <div class="container">
        <h3>Cadastro</h3>
        <form action="pagamento.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input id="valor" name="valor" type="text" class="validate" required="true">
                    <label class="active" for="valor">Valor: </label>
                </div>
                <div class="input-field col s6">
                    <input class="validate" type="text" name="dt_pg" id="dt_pg" required="true">
                    <label class="active" for="dt_pg">Data pagamento:</label>
                </div>
                <div class="input-field col s6">
                    <input class="validate" type="text" name="cliente" id="cliente" required="true">
                    <label class="active" for="cliente">Cliente: </label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
        </form>
    </div>
</body>
</html>

<?php
    require "funcoes/funcoes_db.php";

    $valor = $_POST['valor'];
    $dt_pg = $_POST['dt_pg'];
    $cliente = $_POST['cliente'];

    $objConn = retornaConexao();

    $sql_insert = "insert into pagamento(pag_valor, pag_datapagament, cli_codigo)
                    values($valor, $dt_pg, $cliente)";

    $rs = $objConn->Execute($sql_insert);
    
    if(!$rs->ErrorMsg())
    {
        die('<div class="row">' .
                '<div class="col s12 m5">' .
                    '<div class="card-panel teal">' .
                        '<span class="white-text">Inserido com sucesso!</span>' .
                    '</div>' .
                '</div>' .
            '</div>');
    }else{
        die('Erro!');
    }
?>