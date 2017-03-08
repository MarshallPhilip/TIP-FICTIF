<?php
	require_once("../head.php");
	$badge = $_POST['badge'];
	$connexion = login($badge);

	if($connexion != false){
		$_SESSION['user'][0] = $connexion['Prenom']." ".$connexion['Nom'];
		$_SESSION['user'][1] = $connexion['ID'];
		$statut = $connexion['Statut'];

		if($statut == "emp")
		{
			header("Location: ../standard/IndexStandard.php?statut=$statut");
		}
		else {
			header("Location: ../admin/indexAdmin.php?statut=$statut");
		}
	}
	else
	{
		header('Location: index.php?error=1');
	}
?>
