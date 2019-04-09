<?php
    require_once("../funcoes_db/connBD.php");

    session_start();

    $id = $_GET['id'];

    $objConn = retornaConexao();
    
    $rsPes = $objConn->Execute("select pes_codigo, pes_nome, pes_cpf, pes_rg " .
                                "from public.pessoa where pes_codigo=$id");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
    <?php include 'menu.html';?>
    <div class="container">
        <h3>Editar pessoa</h3>
        <br>        
        <form action="edit_pessoa.php" method="post">
            <div class="row">
            <input name="id" id="id" type="text" hidden="true" value="<?php echo $rsPes->fields[0] ?>">
                <div class="input-field col s6">
                    <input name="nome" id="nome" type="text" class="validate" required="true" value="<?php echo $rsPes->fields[1] ?>">
                    <label class="active" for="nome">Nome:</label>
                </div>
                <div class="input-field col s6">
                    <input name="cpf" id="cpf" type="text" class="validate" required="true" value="<?php echo $rsPes->fields[2] ?>">
                    <label class="active" for="cpf">CPF:</label>
                </div>
                <div class="input-field col s6">
                    <input name="rg" id="rg" type="text" class="validate" required="true" value="<?php echo $rsPes->fields[3] ?>">
                    <label class="active" for="rg">RG:</label>
                </div>
            </div>
            <br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
            <a class="btn waves-effect waves-light" href="pessoa.php">Voltar<i class="mdi-content-reply left"></i></a>
            <br><br>
        </form>
    </div>

    <script>
    $(document).ready(function() {
        M.updateTextFields();
    });
    </script>
</body>
</html>