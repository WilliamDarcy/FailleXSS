
<?php
if (isset($_POST["texteCommentaire"]))
{
	if (InsertionCommentaire($_POST["texteCommentaire"]) === false)
	{
		echo "Problème avec la base de données";
	}
	//InsererResultat(strip_tags($_POST["texteCommentaire"]));

}
$lesCommentaires = LireCommentaires();

if ($lesCommentaires)
{
	//boucle sur les commentaires
	foreach ($lesCommentaires as $unCommentaire)
	{
		echo "<div>" . htmlspecialchars($unCommentaire["textecommentaire"]) . "</div>";
		echo "<hr>";
	}
}
