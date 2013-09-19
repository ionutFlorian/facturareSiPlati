<?php

$config['db'] = array(
	'host' => 'localhost',
	'username' => 'root',
	'password' => '',
	'dbname' => 'site'
);

$db  = new PDO('mysql:host='. $config['db']['host'] . ';dbname=' . $config['db']['dbname'], $config['db']['username'], $config['db']['password']);
$count = 0;
while($count<20){
	$facturi = $db->query("INSERT INTO `facturi` (`title`) VALUES('factura_" . $count ."')");
	$count += 1;
}

echo 'Sa facut inserarea facturilor </br>';


$numarPlati = 0;
$facturi = $db->query("SELECT * FROM `facturi`");
while($rows < 20){
	$numarPlati = 0;
	$count = 0;
	while($numarPlati<10){
		$plati = rand (100 , 500 );
		$facturi = $db->query("INSERT INTO `plati` (`facturaId`, `suma`) VALUES('" . $count ."', '" . $plati ."')");
		$numarPlati += 1;
		$count +=1;
	}
	$rows +=1;
}

echo 'Sa facut inserarea platilor</br>';

