<?php
require("../funcoes_db/connBD.php");

$id = $_POST['id'];
$dt_venc = $_POST['dt_venc'];
$cliente = $_POST['cliente'];
$servico = $_POST['servico'];

$objConn = retornaConexao();

$sql =  "update plano set pla_datavencimento=cast('$dt_venc' as date), cli_codigo=$cliente, ser_codigo=$servico ";
$sql .= "where pla_codigo=$id";

$rs = $objConn->Execute($sql);

if ($rs) {
    header("Location: plano.php");
} else {
    echo "Erro ao tentar editar!";
}

?>