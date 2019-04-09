<?php
require_once("../funcoes_db/connBD.php");

session_start();

$objConn = retornaConexao();

$id = $_POST['id'];
$descricao = $_POST['descricao'];

$sql_edit = "update public.perfil set per_descricaoperfil = '$descricao' " .
            "where per_codigo = $id";
            
$rs = $objConn->Execute($sql_edit);

if ($rs != false) {
    $_SESSION['msg'] = "<p style='green'>Editado com sucesso!</p>";
    
    header("Location: perfil.php");
} else {
    $_SESSION['msg'] = "<p style='red'>Erro ao editar!</p>";
    
    header("Location: perfil.php");
}


?>