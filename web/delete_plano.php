<?php
require_once("../funcoes_db/connBD.php");

$id = $_GET['id'];

$objConn = retornaConexao();

$sql = "delete from public.plano where pla_codigo = $id";

$rs = $objConn->Execute($sql);

if($rs){
    header("Location: plano.php");
}
?>