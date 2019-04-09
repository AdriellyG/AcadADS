<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro mensalidade</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>
    <div class="container">
        <h3>Cadastro</h3>
        <form action="mensalidade.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input name="valor" id="valor" type="text" class="validate" required="true">
                    <label class="active" for="valor">Valor: </label>
                </div>
                <div class="input-field col s6">
                    <input name="dt_pg" id="dt_pg" type="text" class="validate" required="true">
                    <label class="active" for="dt_pg">Data pagamento:</label>
                </div>
                <div class="input-field col s6">
                    <input name="status" id="status" type="text" class="validate" required="true">
                    <label class="active" for="status">Status:</label>
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
    require_once "funcoes_db/connBD.php";
    $valor = $_POST['valor'];
    $dt_pg = $_POST['dt_pg'];
    $status = $_POST['status'];
    $servico = $_POST['servico'];

    $objConn = retornaConexao();

    $sql_insert = "insert into mensalidade(men_valor, men_datapagamento, men_status, ser_codigo)
                    values($valor, $dt_pg, $status, $servico)";

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
</body>
</html>