<?php
    include_once 'database.php';
	try
	{
		$obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
		$obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE DATABASE IF NOT EXISTS camagru";
		$obj->exec($sql);
		$obj = null;
		$MYSQL = $MYSQL.';dbname=camagru';
		$obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
		$obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE IF NOT EXISTS users
				(
					id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
					username VARCHAR(20) UNIQUE NOT NULL,
					user_key VARCHAR(50) NOT NULL,
					email VARCHAR(50) NOT NULL,
					account_confirmed VARCHAR(4) NOT NULL DEFAULT 'NO',
					confirmation_code VARCHAR(10000) NOT NULL,
					receive_notifications VARCHAR(4) NOT NULL DEFAULT 'YES'

				)";
		$obj->exec($sql);
		$obj = NULL;
		$obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
		$obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE IF NOT EXISTS images
				(
					image_id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
					image_name VARCHAR(20) UNIQUE NOT NULL,
					image_path VARCHAR(20) UNIQUE NOT NULL,
					upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
					id INT(11) NOT NULL,
				    FOREIGN KEY(id) REFERENCES users(id)
				)";
		$obj->exec($sql);
		$obj = NULL;
		$obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
		$obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE IF NOT EXISTS comments
				(
					comment_id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
					comment VARCHAR(20) NOT NULL,
					image_id INT(11) NOT NULL,
					id INT(11) NOT NULL,
					FOREIGN KEY(image_id) REFERENCES images(image_id),
					FOREIGN KEY(id) REFERENCES users(id)
				)";
		$obj->exec($sql);
		$obj = NULL;
		$obj = new PDO($MYSQL, $DB_USER, $DB_PASSWORD);
		$obj->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "CREATE TABLE IF NOT EXISTS likes
				(
					like_id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
					like_no INT(11) NOT NULL DEFAULT 0,
					image_id INT(11) NOT NULL,
					id INT(11) NOT NULL,
					FOREIGN KEY(image_id) REFERENCES images(image_id),
					FOREIGN KEY(id) REFERENCES users(id)
				)";
		$obj->exec($sql);
	}
	catch(PDOException $ex)
	{
		echo "Connection faild: ". $ex->getMessage();
	}
?>