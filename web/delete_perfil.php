<?php
require_once("../funcoes_db/connBD.php");

$id = $_GET['id'];

$objConn = retornaConexao();

$sql = "delete from public.perfil where per_codigo = $id";

$rs = $objConn->Execute($sql);

if ($rs != false) {
    $_SESSION['msg'] = "<p style='color: green'>Excluído com sucesso!</p>";

    header("Location: perfil.php");
} else {
    $_SESSION['msg'] = "<p style='color: red'>Erro ao excluir!</p>";

    header("Location: perfil.php");
}

?>