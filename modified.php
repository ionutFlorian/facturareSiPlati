<?php

include('helpers.php');
include('./DB.php');
$time_start = \microtime(true); //start time
$config['db'] = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'site'
);

$numarDeElementePePagina = 5;

$paginaCurenta = isset($_GET['paginaCurenta']) ? $_GET['paginaCurenta'] : 1;
$paginaLimita = $paginaCurenta != 1 ? $paginaCurenta * 5 - 5 : 0;

$db = \DB::getInstance();
$facturi = $db->prepare("select facturi.title, sum(plati.suma) as suma, count(plati.facturaId) as numar from facturi left join plati on(facturi.id = plati.facturaId) group by facturi.id limit {$paginaLimita},{$numarDeElementePePagina}");
$facturi->execute();

$factura = $db->query("select count(*) nrPagini from facturi left join plati on(facturi.id = plati.facturaId) group by facturi.id");
$factura = $factura->fetch(PDO::FETCH_ASSOC);

$totalElemente = $factura['nrPagini'];
$ultimaPagina = ceil($totalElemente / $numarDeElementePePagina);

$time_end = \microtime(true);
$time = $time_end - $time_start;

render('index', array(
    'facturi' => $facturi,
    'ultimaPagina' => $ultimaPagina,
    'time' => $time
));
