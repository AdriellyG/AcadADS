<?php
require_once("../funcoes_db/connBD.php");

session_start();

$id = $_GET['id'];

$objConn = retornaConexao();

$sql = "delete from public.servico where ser_codigo = $id";

$rs = $objConn->Execute($sql);

if($rs != false){
    $_SESSION['msg'] = "Inserido com sucesso!";
    header("Location: servico.php");
}else{
    $_SESSION['msg'] = "Erro ao inserir!";
    header("Location: servico.php");
}
?>