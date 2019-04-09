<?php
require_once("../funcoes_db/connBD.php");

session_start();

$id = $_POST['id'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];

$objConn = retornaConexao();

$sql_update = "update public.pessoa set pes_nome = '$nome', pes_cpf = '$cpf', pes_rg = '$rg' ".
              "where pes_codigo = $id";

$rsEdit = $objConn->Execute($sql_update);

if($rsEdit != false){
    $_SESSION['msg'] = "<p style='color: green'>Alterado com sucesso!</p>";
    
    header("Location: pessoa.php");
}else{
    $_SESSION['msg'] = "<p style='olor: red'>Erro ao alterar!</p>";
    
    header("Location: pessoa.php");
}

?>