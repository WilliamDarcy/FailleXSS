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

/***
 * Ce fichier doit contenir toutes les requêtes SQL pour la table Commentaire. 
*/

/***
 * LireCommentaire retourne tous les commentaires dans un tableau associatif. 
 */
function LireCommentaires()
{
	//Connection à la base
	$dbh = connect();
	$sql="select * from commentaire";
	
	$query  =  $dbh->query($sql);
	if ($query)
	{
		return  $query->fetchAll();
	}
	else
	{
		return false;
	}

}


/***
 * InsertionCommentaire insére un commentaire dans la base avec des requêtes préparées
 * @param  $texte : le texte à insérer
 * @return vrai si la requête s'est bien déroulée
 */
function InsertionCommentaire($texte)
{
	$retour = false;
	//Connexion à la base
	$dbh = connect();
	//La requête SQL préparée
	$sql="insert into commentaire values (null, :texte, NOW())";
	$pre = $dbh->prepare($sql);
	if ($pre !== false)
	{
		//Lie le paramètre à la requête préparée.
		$pre->bindValue(":texte", $texte);
		$retour = $pre->execute();

	}
	//Libére la ressource
	$dbh = null;
	return $retour;
	
}

