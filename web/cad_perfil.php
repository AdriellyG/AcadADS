<?php
    ini_set('display_errors', true);
    ini_set('error_reporting', E_ALL);
    require_once "../funcoes_db/connBD.php";

    $descricao = $_POST['descricao'];
    

    $objConn = retornaConexao();

    $sql_insert = "insert into perfil(per_descricaoperfil)
                    values('$descricao')";

    $rs = $objConn->Execute($sql_insert);

    if($rs != false){
        $_SESSION['msg'] = "<p style='green'>Inserido com sucesso!</p>";
    
        header("Location: perfil.php");
    }else {
        $_SESSION['msg'] = "<p style='red'>Erro ao inserir!</p>";
    
        header("Location: perfil.php");
    }
?>