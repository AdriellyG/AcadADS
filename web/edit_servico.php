<?php
require_once("../funcoes_db/connBD.php");

session_start();

$objConn = retornaConexao();

$id = $_POST['id'];
$descricao = $_POST['descricao'];

$sql = "update public.servico set ser_descricaoservico = '$descricao' where ser_codigo = $id";

$rs = $objConn->Execute($sql);

if($rs != false){
    $_SESSION['msg'] = "Inserido com sucesso!";
    header("Location: servico.php");
}else {
    $_SESSION['msg'] = "Erro ao inserir!";
    header("Location: servico.php");
}

?>