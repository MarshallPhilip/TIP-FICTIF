<?php
	session_start();
  include("head.php");


	$badge = $_POST['badge'];
	$connexion = login($badge);

	if($connexion != false){
		$_SESSION['login'] = $connexion['Prenom']." ".$connexion['Nom'];
	}
	else
	{
		header('Location: index.php?error=1');
	}
	echo $_SESSION['login'];

?>
