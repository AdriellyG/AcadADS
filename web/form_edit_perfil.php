<?php
require_once("../funcoes_db/connBD.php");

$objConn = retornaConexao();

$id = $_GET['id'];

$sql = "select per_codigo, per_descricaoperfil from public.perfil where per_codigo = $id";

$rs = $objConn->Execute($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>

    <div class="container">
        <h3>Edita perfil</h3>
        <form action="edit_perfil.php" method="post">
            <div class="row">
            <input name="id" id="id" type="text" value="<?php echo $rs->fields[0];?>" hidden="true">
                <div class="input-field col s6">
                    <input name="descricao" id="descricao" type="text" value="<?php echo $rs->fields[1];?>" class="validate" required="true">
                    <label class="active" for="descricao">Descrição:</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
        </form>
        <br><br>
    </div>
</body>
</html>