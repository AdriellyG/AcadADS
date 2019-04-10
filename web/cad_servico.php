<?php
require_once("../funcoes_db/connBD.php");

session_start();

$objConn = retornaConexao();

$des = $_POST['descricao'];

$sql = "insert into public.servico(ser_descricaoservico) values('$des')";

$rs = $objConn->Execute($sql);

if($rs != false){
    $_SESSION['msg'] = "Inserido com sucesso!";
    header("Location: servico.php");
}else{
    $_SESSION['msg'] = "Erro ao inserir!";
    header("Location: servico.php");
}

?>