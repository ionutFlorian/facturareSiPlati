<?php
$time_start = microtime(true);//start time
//configurare DB
$config['db'] = array(
	'host' => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname' => 'site'
);
//conectare la DB
$db  = new PDO('mysql:host='. $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
//selectare titlu facturi din tabela factrui
$facturi = $db->query("SELECT `facturi`.`title`,`facturi`.`id` FROM `facturi`");
//cat timp sunt rezultate executa
while($rows = $facturi->fetch(PDO::FETCH_ASSOC)){
	$count  = 0;//contor pentru plati
	$valoareTotala = 0; //total suma pe factura
	//selectare facturi dupa variabila :factura
	$platiPentruFacturi = $db->prepare("SELECT `plati`.`suma` from `plati` where `plati`.`facturaId` = :factura");
	//atribuire variabila :factura, id-ul facturi curente
	$platiPentruFacturi->bindValue('factura', $rows['id'], PDO::PARAM_STR);
	//executare query in DB dupa atribuire variabila :factura
	$platiPentruFacturi->execute();
	
	//cat timp sunt rezultate pentru plati unde :factura = IdFactura executa
	while($columns = $platiPentruFacturi->fetch(PDO::FETCH_ASSOC)){
		$count += count($columns);	//contorizare plati
		$valoareTotala += $columns['suma'];//total suma plata/factura
	}
	//printare rezultat
	echo '<pre>', print_r($rows['title']), ' are ' , $count , ' plati si o suma de ',$valoareTotala ,'</pre></br>';
}
//end time
$time_end = microtime(true);

$time = $time_end - $time_start;

echo "A durat $time secunde\n";