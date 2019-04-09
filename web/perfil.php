<?php
    ini_set('display_errors', true);
    ini_set('error_reporting', E_ALL);
    
    require_once "../funcoes_db/connBD.php";

    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>

    <div class="container">
        <h2>Perfil</h2>
        <table>
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                <?php echo listaPerfil();?>
            </tbody>
        </table>
        <br>
        <a class="btn waves-effect waves-light" href="perfil_novo.php">Novo</a>
        <br><br>
    </div>
    
</body>
</html>

<?php
    function listaPerfil(){
        $objConn = retornaConexao();

        $rsPerfil = $objConn->Execute("select per_codigo, per_descricaoperfil as descricao from public.perfil");

        $retorno = "";

        while(!$rsPerfil->EOF){
            $id = $rsPerfil->fields[0];

            $retorno .= "<tr>" .
                            "<td>" . $rsPerfil->fields[1] . "</td>" .
                            "<td><a href='form_edit_perfil.php?id=$id'><i class='material-icons'>edit</i></a></td>" .
                            "<td><a href='delete_perfil.php?id=$id'><i class='material-icons'>delete</i></a></td>" .
                        "</tr>";

            $rsPerfil->MoveNext();
        }

        return $retorno;
    }
?>