<?php
/* ici une fonction getConnection() */
	function getConnexion($dbname)
	{
		//Test de connexion à la BD
		try
		{
			$dsn = 'mysql:dbname='.$dbname.';host=localhost';
			$user = 'root';
			$password = '';

			$cnn = new PDO($dsn, $user, $password);
			return $cnn;
		} catch (PDOException $e)
		{
			//Connexion erronée, lire message d'erreur
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}

	}

	//Fonction permettant à un utilisateur de se conneter depuis l'index
	function login($badge)
	{
		$cnn = getConnexion('tpi-fictif');
		//Permet de savoir plus facilement si login correct ou pas
		$stmt = $cnn -> prepare('SELECT `ID`, `Nom`, `Prenom`, `Badge`, `Statut` FROM `user` WHERE `Badge` LIKE :badge');
		$stmt -> bindValue(':badge', $badge, PDO::PARAM_STR);
		$stmt -> execute();

		$row = $stmt->fetch(PDO::FETCH_OBJ);

		//Teste si le résultat de la requête n'est PAS vide
		if(!empty($row))
		{
			//Mise en tableau pour retourner plusieurs param en un
			$login = array('ID' => $row->ID,
										'Nom' => $row->Nom,
									'Prenom'=> $row->Prenom,
									'Badge' => $row->Badge,
							   'Statut' => $row->Statut);
			return $login;
		}
		else
		{
			//La requête est vide : login erroné
			return false;
		}
	}

	//Retourne la liste des articles de consommation
	function Listeconsommation()
	{

		$cnn = getConnexion('tpi-fictif');
		$i = 0;
		//Permet de savoir plus facilement si login correct ou pas
		$consom = [];
		$stmt = $cnn -> prepare('SELECT `ID`, `Nom`, `Prix` FROM `consommation`');
		$stmt -> execute();
		//Remplissange tab 2 dimensions pour avoir les infos qu'on souhaite
		//Passage en param plus facile
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$consom[$i][0] = $row->ID;
			$consom[$i][1] = $row->Nom;
			$consom[$i][2] = $row->Prix;
			$i++;
		}
		if(!empty($consom))
		{
			return $consom;
		}
		else
		{
			return false;
		}
	}

	function Saisieconsommation($saisie)
	{
		$cnn = getConnexion('tpi-fictif');
		//Préparation requête
		$debutSQL = "INSERT INTO `consomme` (`User_ID`, `Consommation_ID`, `DateConsommation`, `Nombre`) VALUES";
		$values = "";
		$i = 0;
		//Ecriture des values avec foreach
		foreach ($saisie as $key => $value) {
			//Premier passage sans virgule (nouvelle ligne)
			if($i == 0){
				$values .= "(".$_SESSION['user'][1].", ".$saisie[$key][0].", '".date('d/m/Y')."', ".$saisie[$key][1].")";
				$i = 1;
			}
			else{
				//on met une "," des la 2e ligne pour ne pas devoir l'enlever à la fin
				$values .= ", (".$_SESSION['user'][1].", ".$saisie[$key][0].", '".date('d/m/Y')."', ".$saisie[$key][1].")";
			}


		}
		//Concat du début de la req et de la fin passée dans le foreach
		$req = $debutSQL.$values.";";
		$stmt = $cnn -> prepare($req);
		$stmt -> execute();
	}

	//Extrait les achats d'une personne
	function mesAchats()
	{
		$cnn = getConnexion('tpi-fictif');

		$i = 0;
		//Permet de savoir plus facilement si login correct ou pas
		$mesAchats = [];
		$sql = 'SELECT `consommation`.`Nom`, `consomme`.`DateConsommation`, `consomme`.`Nombre`, `consomme`.`PrixVendu`, `consomme`.`Paye` FROM `consomme` INNER JOIN `consommation` ON `consomme`.`Consommation_ID` = `consommation`.`ID` and `consomme`.`User_ID` ='.$_SESSION['user'][1];
		$stmt = $cnn -> prepare($sql);
		$stmt -> execute();
		//Remplissange tab 2 dimensions pour avoir les infos qu'on souhaite
		//Passage en param plus facile
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$mesAchats[$i][0] = $row->Nom;
			$mesAchats[$i][1] = $row->DateConsommation;
			$mesAchats[$i][2] = $row->Nombre;
			$mesAchats[$i][3] = $row->PrixVendu;
			$mesAchats[$i][4] = $row->Paye;
			$i++;
		}
		if(!empty($mesAchats))
		{
			return $mesAchats;
		}
		else
		{
			return false;
		}
	}

	//Modifie une consommation
	function editConsom($choix, $idConsomme, $statut)
	{
		$cnn = getConnexion('tpi-fictif');

		$sql = 'UPDATE `consomme` SET `consomme`.`Nombre` = '.$choix.' WHERE `consomme`.`IDConsomme` = '.$idConsomme;
		$stmt = $cnn -> prepare($sql);
		$stmt -> execute();
		echo 'lalala';
		header("Location: factures.php?statut=$statut");


	}

	//Retourne tous les utilisateurs existants dans la BD
	function extractUsers($action)
	{
		$cnn = getConnexion('tpi-fictif');
		$users = [];
		$i = 0;
		//Req 0 si on ne veut que l'ID, nom Prenom
		//Req 1 si on souhaite tous les champs (gerer users)
		//Req 2 retourne un utilisateur qu'on veut modifier PS: la valeur de action
		//correspond a l'ID du user
		if($action == "list")
		{
			$sql = 'SELECT `ID`, `Nom`, `Prenom` FROM `user`';
		}elseif($action == "all")
		{
			$sql = 'SELECT `ID`, `Nom`, `Prenom`, `Badge`, `Statut` FROM `user`';
		}else
		{
			$sql = 'SELECT `ID`, `Nom`, `Prenom`, `Badge`, `Statut` FROM `user` WHERE `user`.`ID` = '.$action;
		}
		//Permet de savoir plus facilement si login correct ou pas
		$stmt = $cnn -> prepare($sql);
		$stmt -> execute();

		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$users[$i] = $row;
			$i++;
		}
		return $users;
	}
	//Extrait les consommation d'un certain user pour en faire une facture
	function facture($userID)
	{
		$cnn = getConnexion('tpi-fictif');

		$i = 0;
		$achatsUser = [];
		$sql = 'SELECT `consomme`.`IDConsomme`, `consommation`.`ID`, `consommation`.`Nom`, `consomme`.`DateConsommation`, `consomme`.`Nombre`, `consomme`.`PrixVendu`, `consomme`.`Paye` FROM `consomme`
		INNER JOIN `consommation` ON `consomme`.`Consommation_ID` = `consommation`.`ID` and `consomme`.`User_ID` = '.$userID.' ORDER BY `consomme`.`IDConsomme` DESC';

		$stmt = $cnn -> prepare($sql);
		$stmt -> execute();
		//Remplissange tab 2 dimensions pour avoir les infos qu'on souhaite
		//Passage en param plus facile
		while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
			$achatsUser[$i] = $row;
			$i++;
		}
		if(!empty($achatsUser))
		{
			return $achatsUser;
		}
		else
		{
			return 'aucune consommation pour cet uilisateur';
		}

	}

	//Modifie un utilisateut dans la table user
	function editUser($id, $nom, $prenom, $badge, $statut)
	{
		$cnn = getConnexion('tpi-fictif');
		echo $statut;

		$sql = "UPDATE `user` SET `Nom` = '$nom', `Prenom` = '$prenom', `badge` = '$badge', `Statut` = '$statut' WHERE `ID` = $id";

		$stmt = $cnn -> prepare($sql);
		$stmt -> execute();

		if($stmt)
		{
			echo '<script>alert("Modification réussie")</script>';
			header("Location: gerer.php?statut=$statut");
		}else
		{
			echo '<script>alert("Modification erronée")</script>';
			header("Location: gerer.php?statut=$statut");
		}
	}
	//Supprime un utilisateur
	function delUser($statut, $idUser)
	{
		$cnn = getConnexion('tpi-fictif');
		$sql = 'DELETE FROM `user` WHERE `user`.`ID` = '.$idUser;

		$stmt = $cnn -> prepare($sql);
		$stmt -> execute();

		if($stmt)
		{
			echo '<script>alert("Suppression réussie")</script>';
			header("Location: gerer.php?statut=$statut");
		}else
		{
			echo '<script>alert("Suppression impossible")</script>';
			header("Location: gerer.php?statut=$statut");
		}

	}

?>
