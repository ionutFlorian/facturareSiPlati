<?php
$time_start = microtime(true);//start time
$config['db'] = array(
	'host' => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname' => 'site'
);
$db  = new PDO('mysql:host='. $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
$facturi = $db->query("SELECT * FROM `facturi`");
while($rows = $facturi->fetch(PDO::FETCH_ASSOC)){
	$count  = 0;
	$valoareTotala = 0;
	$platiPentruFacturi = $db->prepare("SELECT * where `plati`.`facturaId` = :factura");
	$platiPentruFacturi->bindValue('factura', $rows['id'], PDO::PARAM_STR);
	$platiPentruFacturi->execute();
	
	while($columns = $platiPentruFacturi->fetch(PDO::FETCH_ASSOC)){
		$count += count($columns);	
		$valoareTotala += $columns['suma'];
	}
	echo '<pre>', print_r($rows['title']), ' are ' , $count , ' plati si o suma de ',$valoareTotala ,'</pre></br>';
}
$time_end = microtime(true);

$time = $time_end - $time_start;

echo "A durat $time secunde\n";