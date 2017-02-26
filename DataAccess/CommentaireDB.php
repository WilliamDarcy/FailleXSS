<?php
include_once 'initDB.php';

/***
 * Ce fichier doit contenir toutes les requêtes SQL pour la table Commentaire. 
 * Pour que le programme fonctionne il faut modifier les valeurs dans InitDB et créer une table commentaire 
 * avec un id et un champ texteCommentaire
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
 * InsertionCommentaire insére un commentaire dans la base
 * @param  $texte : le texte à insérer
 * @return le nombre de commentaires insérés
 */
function InsertionCommentaire($texte)
{

	//Connexion à la base
	$dbh = connect();
	$sql="insert into commentaire values (null, '$texte')";
	$insertion  =  $dbh->exec($sql);
  
	//Libération de la ressource (pas obligatoire car elle est libérée à la fin du script)
	$dbh = NULL;
	return $insertion;
}