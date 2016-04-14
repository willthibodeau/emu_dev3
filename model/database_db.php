<?php
global $db;
$debug = true;
	if ($_SERVER['HTTP_HOST'] == "localhost" OR $_SERVER['HTTP_HOST'] == "127.0.0.1") {
		$dsn = 'mysql:host=localhost;dbname=elitemeats_dev1';
		$username = 'will';
		$password = '1234';
	} else {
		$dsn = 'mysql:host=wordpresswillcom.ipagemysql.com;dbname=elitemeats_dev1';
		$username = 'will';
		$password = '1234';
	}

	try {
		$db = new PDO($dsn, $username, $password);
	} catch (PDOException $e) {
		echo 'please correct the database connection error';
		exit();
	}
?>
