<?php
    ini_set('display_errors', true);
    ini_set('error_reporting', E_ALL);

    session_start();
    require_once("funcoes_db/connBD.php");

    function cliAtivos(){
        $objConn = retornaConexao();

        $rs = $objConn->Execute('select count(1) from public.pessoa');

        $retorno = $rs->fields[0];

        return $retorno;
    }

    function Perfis(){
        $objConn = retornaConexao();

        $rs = $objConn->Execute('select per_descricaoperfil from public.perfil order by per_descricaoperfil asc');

        $retorno = "";

        while(!$rs->EOF){
            $retorno .= $rs->fields[0] . "<br />";

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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="padrao.css" rel="stylesheet">
</head>
<body>
    <nav class="grey">
        <div class="nav-wrapper">
            <!-- <a href="#" class="brand-logo">Logo</a> -->
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php"><i class="material-icons">home</i></a></li>
            <li><a href="web/pessoa.php">Pessoa</a></li>
            <li><a href="web/perfil.php">Perfil</a></li>
            <li><a href="web/servico.php">Serviço</a></li>
            <li><a href="web/plano.php">Plano</a></li>
            <li><a href="web/mensalidade.php">Mensalidade</a></li>
            <li><a href="web/pagamento.php">Pagamento</a></li>
            <li><a href="web/usuario.php">Usuário</a></li>
            </ul>
        </div>
    </nav>
    <section class="container">    
        <div class="row">
            <br><br>
            <div class="col s12 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Nº de clientes:</span>
                        <p>
                        <?php echo cliAtivos();?>
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col s12 m4">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Perfis:</span>
                        <p>
                        <?php echo Perfis();?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>