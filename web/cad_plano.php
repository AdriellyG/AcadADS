<?php
require_once("../funcoes_db/connBD.php");

$dt_venc = $_POST['dt_venc'];
$cliente = $_POST['cliente'];
$servico = $_POST['servico'];

$objConn = retornaConexao();

$sql_insert = "insert into plano(pla_datavencimento, cli_codigo, ser_codigo)
                values(cast('$dt_venc' as date), $cliente, $servico)";

$rs = $objConn->Execute($sql_insert);

if($rs != false)
{
    die('<div class="row">' .
            '<div class="col s12 m5">' .
                '<div class="card-panel teal">' .
                    '<span class="white-text">Inserido com sucesso!</span>' .
                '</div>' .
            '</div>' .
        '</div>');
}else {
    die('<div class="row">' .
            '<div class="col s12 m5">' .
                '<div class="card-panel teal">' .
                    '<span class="white-text">Erro!</span>' .
                '</div>' .
            '</div>' .
        '</div>');
}
?>  