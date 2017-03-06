<?php
	session_start();
  include("head.php");

	$badge = $_POST['badge'];
	$connexion = login($badge);

	if($connexion != false){
		$_SESSION['login'] = $connexion['Prenom']." ".$connexion['Nom'];
		$statut = $connexion['Statut'];

		if($statut == "emp")
		{
			header("Location: saisie.php?statut=$statut");
		}
		else {
			header("Location: indexAdmin.php?statut=$statut");
		}
	}
	else
	{
		header('Location: index.php?error=1');
	}

?>
