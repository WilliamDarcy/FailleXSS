<?php
if (isset($_POST["texteCommentaire"]))
{
	if (InsertionCommentaire($_POST["texteCommentaire"]) === false)
	{
		echo "Probl�me avec la base de donn�es";
	}
	//InsererResultat(strip_tags($_POST["texteCommentaire"]));

}
$lesCommentaires = LireCommentaires();

if ($lesCommentaires)
{
	foreach ($lesCommentaires as $unCommentaire)
	{
		echo "<div>" . htmlspecialchars($unCommentaire["textecommentaire"]) . "</div>";
		echo "<hr>";
	}
}