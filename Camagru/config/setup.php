<?php
    include_once 'database.php';
	try
	{
		$obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
		$sql = "CREATE DATABASE IF NOT EXISTS camagru";
		$obj->exec($sql);
		$obj = null;
		$MYSQL = $MYSQL.';dbname=camagru';
		$obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
		$sql = "CREATE TABLE IF NOT EXISTS users
				(
					id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
					username VARCHAR(20) NOT NULL,
					email VARCHAR(50) NOT NULL,
					account_confirmed VARCHAR(4) NOT NULL DEFAULT 'NO',
					confirmation_code INT(11) NOT NULL,
					receive_notifications VARCHAR(4) NOT NULL DEFAULT 'YES'

				)";
		$obj->exec($sql);
		echo "Everything works perfectly";
	}
	catch(PDOException $ex)
	{
		echo "Connection faild: ". $ex->getMessage();
	}
?>