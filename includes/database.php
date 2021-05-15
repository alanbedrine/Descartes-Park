<?php 

	$HOST = 'localhost';
	$DB_NAME = 'parking';
	$USER = 'root';
	$PASS = '';

	try {
		$db	= new PDO("mysql:host=" . $HOST . ";dbname=" . $DB_NAME .";charset=utf8mb4", $USER, $PASS);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOExepception $e) {
		echo $e;		
	}

?>