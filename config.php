<?php
require 'environment.php';
global $config;
$config = array();
if(ENVIRONMENT == "development"){
    define("BASE_URL", "http://localhost/pzp/contaazul");
    $config['dbname'] = 'contaazul';
    $config['host']   = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'conejo74';
} else {
    define("BASE_URL", "http://infinity-group.net/pzp/contaazul");
    $config['dbname'] = 'infinitygroup';
    $config['host']   = 'mysql.infinity-group.net';
    $config['dbuser'] = 'infinitygroup';
    $config['dbpass'] = 'conejo24';
}

$config['status_pgto'] = array(
    '1' => 'Aguardando Pgto.',
    '2' => 'Aprovado',
    '3' => 'Cancelado'
    );

?>
