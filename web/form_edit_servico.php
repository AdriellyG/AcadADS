<?php
require_once("../funcoes_db/connBD.php");

session_start();

$objConn = retornaConexao();

$id = $_GET['id'];

$sql = "select ser_codigo, ser_descricaoservico from public.servico where ser_codigo = $id";

$rs = $objConn->Execute($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edita serviço</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include("menu.html");?>
    <div class="container">
    <h3>Edita serviço</h3>
    <form action="edit_servico.php" method="post">
        <div class="row">
            <input name="id" id="id" type="text" value="<?php echo $rs->fields[0];?>" hidden="true">
            <div class="input-field col s6">
                <input name="descricao" id="descricao" type="text" value="<?php echo $rs->fields[1];?>" class="validate" required="true">
                <label class="active" for="descricao">Descrição:</label>
            </div>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="action">Editar</button>
        <a class="btn waves-effect waves-light" href="servico.php">Cancelar</a>
        <br><br>
    </form>
    </div>
</body>
</html>