<?php

$time_start = \microtime(true); //start time
$config['db'] = array(
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'dbname' => 'site'
);

$numarDeElementePePagina = 5;

$paginaCurenta = isset($_GET['paginaCurenta']) ? $_GET['paginaCurenta'] : 0;
$paginaLimita = $paginaCurenta != 1 ? $paginaCurenta*5 - 5 : 0;

$db = new \PDO('mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
$facturi = $db->prepare("select facturi.title, sum(plati.suma) as suma, count(plati.facturaId) as numar from facturi left join plati on(facturi.id = plati.facturaId) group by facturi.id limit {$paginaLimita},{$numarDeElementePePagina}");
$facturi->execute();

$factura = $db->query("select count(*) nrPagini from facturi left join plati on(facturi.id = plati.facturaId) group by facturi.id");
$factura = $factura->fetch(PDO::FETCH_ASSOC); 

$totalElemente = $factura['nrPagini'];
$ultimaPagina = ceil($totalElemente / $numarDeElementePePagina);

//show Table
echo '<table style="border:1px solid #000">';
echo '<tr style="border:1px solid #000">';
echo '<th>' . 'Titlu Factura' . '</th>';
echo '<th>' . 'Suma Factura' . '</th>';
echo '<th>' . 'Numar Plati' . '</th>';
echo '</tr>';
while ($rows = $facturi->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    echo '<td style="border:1px solid #000">' . $rows['title'] . '</td>';
    echo '<td style="border:1px solid #000">' . $rows['suma'] . '</td>';
    echo '<td style="border:1px solid #000">' . $rows['numar'] . '</td>';
    echo '</tr>';
}
echo '</table>';

for ($i = 1; $i <= $ultimaPagina; $i++) {
    echo '<a style="padding-left:5px;" href ="' . $_SERVER['PHP_SELF'] . '?paginaCurenta=' . $i . '">' . $i . '</a>';
}

$time_end = \microtime(true);

$time = $time_end - $time_start;

echo "<br />A durat $time secunde\n"; //best time
echo $paginaCurenta;