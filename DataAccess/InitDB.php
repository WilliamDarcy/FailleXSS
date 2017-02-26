<?php

/***
 * Connect : connexion à la base de données
 * @return PDO
 */
function  Connect()
{
	$user = 'root';
	$pass = '';
	$hote = 'localhost';
	$port = '3306';
	$base = 'tpcommentaire';
	$dsn="mysql:$hote;port=$port;dbname=$base";

	try
	{
		$dbh = new PDO($dsn, $user, $pass);

	}
	catch (PDOException $e)
	{
		//Redirection vers une page d'erreur en production
		die("Erreur! :" . $e->getMessage());
	}
	return $dbh;
}