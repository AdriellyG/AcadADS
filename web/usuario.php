<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cadastro usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php include 'menu.html';?>

    <div class="container">
        <h3>Cadastro</h3>
        <form action="usuario.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <input class="validate" type="text" name="email" id="email" required="true">
                    <label class="active" for="email">Email:</label>
                </div>
                <div class="input-field col s6">
                    <input class="validate" type="text" name="senha" id="senha" required="true">
                    <label class="active" for="senha">Senha:</label>
                </div>
                <div class="input-field col s6">
                    <input class="validate" type="text" name="dt_cad" id="dt_cad" required="true">
                    <label class="active" for="dt_cad">Data cadastro:</label>
                </div>
                <div class="input-field col s6">
                    <input class="validate" type="text" name="perfil" id="perfil" required="true">
                    <label class="active" for="perfil">Perfil: </label>
                </div>
                <div class="input-field col s6">
                    <input class="validate" type="text" name="pessoa" id="pessoa" required="true">
                    <label class="active" for="pessoa">Pessoa</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Novo</button>
        </form>
    </div>
</body>
</html>

<?php
    require_once "funcoes/funcoes_db.php";

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $dt_cad = $_POST['dt_cad'];
    $perfil = $_POST['perfil'];
    $pessoa = $_POST['pessoa'];

    $objConn = retornaConexao();

    $sql_insert = "insert into usuario(usu_email, usu_senha, usu_datacadastro, per_codigo, pes_codigo)
                    values($email, $senha, $dt_cad, $perfil, $pessoa)";

    if($rs = $objConn->Execute($sql_insert))
    {
        die('<div class="row">' .
                '<div class="col s12 m5">' .
                    '<div class="card-panel teal">' .
                        '<span class="white-text">Inserido com sucesso!</span>' .
                    '</div>' .
                '</div>' .
            '</div>');
    }
?>