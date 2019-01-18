<?php


include 'CommentaireAffichage.php';
if (isset($_POST["texteCommentaire"]))
{
	if (InsertionCommentaire($_POST["texteCommentaire"]) === false)
	{
		echo "Problème avec la base de données";
	}

}

?>
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
	<?php
	$lesCommentaires = LireCommentaires();

if ($lesCommentaires)
{
	foreach ($lesCommentaires as $unCommentaire)
	{
		?>
		<div>
		<span><?php echo $unCommentaire["texteCommentaire"] ?>
		</<span>
		<span>
		<?php echo date('d-m-Y H:i:s', strtotime($unCommentaire["dateComment"])) ?>
	</span>
		</div>
		<hr>
	<?php 
	}
}
?>
</body>

<?php 


