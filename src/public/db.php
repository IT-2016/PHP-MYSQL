<?php
	$dsn = 'mysql:dbname=todo;host=localhost;charset=UTF8';
	$user = 'root';
	$password = '0000';

	try {
	    $dbh = new PDO($dsn, $user, $password);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}