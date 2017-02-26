<?php
include_once 'initDB.php';

/***
 * Ce fichier doit contenir toutes les requ�tes SQL pour la table Commentaire. 
 * Pour que le programme fonctionne il faut modifier les valeurs dans InitDB et cr�er une table commentaire 
 * avec un id et un champ texteCommentaire
 */

/***
 * LireCommentaire retourne tous les commentaires dans un tableau associatif.
 */
function LireCommentaires()
{
	//Connection � la base
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
 * InsertionCommentaire ins�re un commentaire dans la base
 * @param  $texte : le texte � ins�rer
 * @return le nombre de commentaires ins�r�s
 */
function InsertionCommentaire($texte)
{

	//Connexion � la base
	$dbh = connect();
	$sql="insert into commentaire values (null, '$texte')";
	$insertion  =  $dbh->exec($sql);
  
	//Lib�ration de la ressource (pas obligatoire car elle est lib�r�e � la fin du script)
	$dbh = NULL;
	return $insertion;
}