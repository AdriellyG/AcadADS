<?php
    require_once "../funcoes_db/connBD.php";

    ini_set('display_errors', true);
    ini_set('error_reporting', E_ALL);

    function listaPlano(){
        
        $objConn = retornaConexao();

        $sql = "select pla_codigo, pla_datavencimento, cli_codigo, ser_codigo from public.plano";

        $rs = $objConn->Execute($sql);
        
        $id = 0;

        $retorno = "";

        while(!$rs->EOF){
            $ser_id = $rs->fields[3];
            $sql_servico = "select ser_descricaoservico from public.servico where ser_codigo = $ser_id";

            $cli_id = $rs->fields[2];
            $sql_cliente = "select pes_nome from public.pessoa p " .
                           "inner join public.cliente c on c.cli_ativo = true and c.pes_codigo = p.pes_codigo " .
                           "and cli_codigo = $cli_id";

            $rs_ser = $objConn->Execute($sql_servico);
            $rs_cli = $objConn->Execute($sql_cliente);

            $id = $rs->fields[0];

            $retorno .= "<tr>" .
                            "<td>" . date("d/m/Y", strtotime($rs->fields[1])) . "</td>" .
                            "<td>" . $rs_cli->fields[0] . "</td>" .
                            "<td>" . $rs_ser->fields[0] . "</td>" .
                            "<td><a href='form_edit_plano.php?id=$id'><i class='material-icons'>edit</i></a></td>" .
                            "<td><a href='delete_plano.php?id=$id'><i class='material-icons'>delete</i></a></td" .
                        "<tr>";

            $rs->MoveNext();
        }
        
        return $retorno;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro plano</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include "menu.html"; ?>

    <div class="container">
    <h2>Planos</h2>
        <table>
            <thead>
                <tr>
                    <th>Data vencimento</th>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                
                    <?php echo listaPlano(); ?>
                
            </tbody>
        </table>
        <br>
        <a href="plano_novo.php" class="btn waves-effect waves-light">Novo</a>
        <br><br>
    </div>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>