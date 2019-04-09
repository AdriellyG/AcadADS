<?php 

ini_set('display_errors', true);
ini_set('error_reporting', E_ALL);

include('lib/adodb5/adodb.inc.php');

function retornaConexao(){
    $db = ADONewConnection("postgres");

    $db->Connect("localhost", "postgres", "", "academiaads") or die("Falha na conexão!");

    return $db;
}

$objConn = retornaConexao();

?>