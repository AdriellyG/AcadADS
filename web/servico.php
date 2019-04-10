<?php
require_once("../funcoes_db/connBD.php");

function listaServicos(){
    $objConn = retornaConexao();

    $sql = "select ser_codigo, ser_descricaoservico from public.servico order by ser_descricaoservico asc";

    $rs = $objConn->Execute($sql);

    $retorno = "";
    
    $id = 0;
    while(!$rs->EOF){
        $id = $rs->fields[0];

        $retorno .= "<tr>" .
                        "<td>" . $rs->fields[1] . "</td>" .
                        "<td><a href='form_edit_servico.php?id=$id'><i class='material-icons'>edit</i></a></td>" .
                        "<td><a href='delete_servico.php?id=$id'><i class='material-icons'>delete</i></a></td" .
                    "<tr>";

        $rs->MoveNext();
    }
    return $retorno;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastrar serviço</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php include "menu.html"; ?>

    <div class="container">
    <h2>Serviço</h2>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php echo listaServicos(); ?>
                
            </tbody>
        </table>
        <br>
        <a href="servico_novo.php" class="btn waves-effect waves-light">Novo</a>
        <br><br>
    </div>
</body>
</html>