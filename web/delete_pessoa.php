<?php
require_once("../funcoes_db/connBD.php");

session_start();

$objConn = retornaConexao();

$id = $_GET['id'];

$sql_delete = "delete from public.pessoa where pes_codigo = $id";

try {
    $rsDel = $objConn->Execute($sql_delete);
    
    if($rsDel != false){
        $_SESSION['msg'] = "<p style='color: green'>Excluído com sucesso!</p>";
        header("Location: pessoa.php");
    }else {
        $_SESSION['msg'] = "<p style='color: red'>Erro ao excluir!</p>";
    }
} catch (\Throwable $th) {
    $_SESSION['msg'] = "<p style='color: red'>Ocorreu um erro interno ao tentar deletar: $th</p>";
}