<?php

include "DataAccess/CommentaireDB.php" ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"> 
 <title>Formulaire PHP</title>
</head>
<body>
	<form method="post" action="index.php">
	<textarea rows="15" cols="70" name="texteCommentaire"></textarea>
	<br>
		<input type="submit" value="OK" >


	</form>
	<h1>Les commentaires</h1>
</body>
<?php 

include 'CommentaireAffichage.php';
