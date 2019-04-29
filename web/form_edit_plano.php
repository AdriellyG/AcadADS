<?php
    require_once("../funcoes_db/connBD.php");

    session_start();

    $id = $_GET['id'];

    $objConn = retornaConexao();
    
    $sql = "select pla_codigo, pla_datavencimento, cli_codigo, ser_codigo from public.plano where pla_codigo=$id";

    $rsPlano = $objConn->Execute($sql);
    $id_servico = $rsPlano->fields[3];
    $id_cliente = $rsPlano->fields[2];

    $data = date('Y-m-d', strtotime($rsPlano->fields[1]));
    
    function servicoSelect($id_servico){
        $objConn = retornaConexao();

        $sql = "select ser_codigo, ser_descricaoservico from public.servico";

        $rs = $objConn->Execute($sql);

        $retorno = "<select id='servico' name='servico'>";
        $retorno .= "<option value='' disabled selected>Selecione ...</option>";
        $cont = 1;
        while(!$rs->EOF){
            $valor = $rs->fields[1];
            $cont = $rs->fields[0];

            if($id_servico == $rs->fields[0]){
                $retorno .= "<option selected='selected' value='$cont'>$valor</option>";
            }else {
                $retorno .= "<option value='$cont'>$valor</option>";
            }
    
            $rs->MoveNext();
        }
        $retorno .= "</select>";
        
        return $retorno;
    }

    function clienteSelect($id_cliente){
        
        $objConn = retornaConexao();

        $sql = "select b.cli_codigo, a.pes_nome " .
                "from pessoa a " .
                "inner join cliente b on a.pes_codigo = b.pes_codigo";

        $rs = $objConn->Execute($sql);
        
        $retorno = "<select id='cliente' name='cliente'>";
        $retorno .= "<option value='' disabled selected>Selecione ...</option>";
        $cont = 1;
        while(!$rs->EOF){
            $valor = $rs->fields[1];
            $cont = $rs->fields[0];
            if ($id_cliente == $rs->fields[0]) {
                $retorno .= "<option selected='selected' value='$cont'>$valor</option>";
            } else {
                $retorno .= "<option value='$cont'>$valor</option>";
            }
            
    
            $rs->MoveNext();
        }
        $retorno .= "</select>";
        
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
    <?php include 'menu.html';?>
    <div class="container">
        <h3>Cadastro</h3>
        <form action="edit_plano.php" method="post">
            <div class="row">
            <input name="id" id="id" type="text" hidden="true" value="<?php echo $rsPlano->fields[0] ?>">
                <div class="input-field col s6">
                    <input name="dt_venc" id="dt_venc" type="date" class="datepicker" required="true" value="<?php echo $data; ?>">
                    <label class="active" for="dt_venc">Data vencimento:</label>
                </div>
                <div class="input-field col s6">
                    <?php echo servicoSelect($id_servico); ?>
                    <label>Serviço</label>
                </div>
                <div class="input-field col s6">
                    <?php echo clienteSelect($id_cliente); ?>
                    <label>Cliente</label>
                </div>
                
            </div>
            <button class="btn waves-effect waves-light" type="submit" name="action">Editar</button>
            <a class="btn waves-effect waves-light" href="plano.php">Voltar<i class="mdi-content-reply left"></i></a>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $('select').formSelect();
        });
    </script>
</body>
</html>