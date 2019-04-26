<?php
require_once("../funcoes_db/connBD.php");

session_start();

$objConn = retornaConexao();

$id = $_GET['id'];

$sql_pessoa = "update pessoa set pes_ativo = false where pes_codigo = $id";
$sql_cliente = "update cliente set cli_ativo = false where pes_codigo = $id";

$rsInativaPes = $objConn->Execute($sql_pessoa);
$rsInativaCli = $objConn->Execute($sql_cliente);

if($rsDel != false){
    $_SESSION['msg'] = "<p style='color: green'>Excluído com sucesso!</p>";
    header("Location: pessoa.php");
}else {
    $_SESSION['msg'] = "<p style='color: red'>Erro ao excluir!</p>";
    header("Location: pessoa.php");
}