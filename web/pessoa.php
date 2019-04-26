<?php
    ini_set('display_errors', true);
    ini_set('error_reporting', E_ALL);

    require_once("../funcoes_db/connBD.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pessoa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>

    <div class="container">
        <h2>Pessoa</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>RG</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php echo listaCliente();?>
            </tbody>
        </table>
        <br>
        <a class="btn waves-effect waves-light" href="pessoa_novo.php">Novo</a>
        <br><br><br>
    </div>
    
</body>
</html>

<?php
    function listaCliente(){
        $objConn = retornaConexao();

        $rsPes = $objConn->Execute("select pes_codigo, pes_nome, pes_cpf," .
                                    "pes_rg from public.pessoa " .
                                    "where pes_ativo = true " .
                                    "order by pes_nome");

        $retorno = "";
        
        while(!$rsPes->EOF){
            $id = $rsPes->fields[0];

            $retorno .= "<tr>" .
                            "<td>" . $rsPes->fields[1] . "</td>" .
                            "<td>" . $rsPes->fields[2] . "</td>" . 
                            "<td>" . $rsPes->fields[3] . "</td>" .
                            "<td><a href='form_edit_pessoa.php?id=$id'><i class='material-icons'>edit</i></a></td>" .
                            "<td><a href='delete_pessoa.php?id=$id'><i class='material-icons'>delete</i></a></td>" .
                        "</tr>";

            $rsPes->MoveNext();
        }

        return $retorno;

        $_SESSION['msg'] = "";
    }
?>