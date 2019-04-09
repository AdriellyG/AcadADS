<?php
    require_once("../funcoes_db/connBD.php");

    $nome = $_POST['nome'];
    $cpf  = $_POST['cpf'];
    $rg  = $_POST['rg'];

    $objConn = retornaConexao();
    
    $sql_insert_pes = "insert into pessoa(pes_nome, pes_cpf, pes_rg)
                    values(cast('$nome' as varchar(120)), cast('$cpf' as varchar(14)), cast('$rg' as varchar(20)))";

    $rsInsertPes = $objConn->Execute($sql_insert_pes);

    if($rsInsertPes != false){
        $_SESSION['msg'] = "<p style='color: green'>Inserido com sucesso!</p>";
        
        header("Location: pessoa.php");
    }else{
        $_SESSION['msg'] = "<p style='olor: red'>Erro ao inserir!</p>";
        
        header("Location: pessoa.php");
    }
?>