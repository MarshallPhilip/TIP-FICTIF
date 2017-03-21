<?php
	require_once("head.php");
	$badge = $_POST['badge'];
	$connexion = login($badge);
	//Gere la deconnexion
	if(isset($_POST['deconnect'])){
		session_destroy();

		header("Location: index.php");
	}
	//Gere la connexion
	if($connexion != false){
		$_SESSION['user'][0] = $connexion['Prenom']." ".$connexion['Nom'];
		$_SESSION['user'][1] = $connexion['ID'];
		$_SESSION['user'][2] = $connexion['Statut'];
		$statut = $connexion['Statut'];

		if($statut == "emp")
		{
			header("Location: IndexStandard.php?statut=$statut");
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
