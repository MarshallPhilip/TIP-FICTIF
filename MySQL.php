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
		$stmt = $cnn -> prepare('SELECT `Nom`, `Prenom`, `Badge`, `Statut` FROM `user` WHERE `Badge` LIKE :badge');
		$stmt -> bindValue(':badge', $badge, PDO::PARAM_STR);
		$stmt -> execute();

		$row = $stmt->fetch(PDO::FETCH_OBJ);

		//Teste si le résultat de la requête n'est PAS vide
		if(!empty($row))
		{
			//Mise en tableau pour retourner plusieurs param en un
			$login = array('Nom' => $row->Nom,
									'Prenom' => $row->Prenom,
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
	function Listeconsommation($consom)
	{

		$cnn = getConnexion('tpi-fictif');
		$i = 0;
		//Permet de savoir plus facilement si login correct ou pas

		$stmt = $cnn -> prepare('SELECT `ID`, `Nom`, `Prix` FROM `consommation`');
		$stmt -> execute();
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
		$Debutsql = "INSERT INTO `consomme` (`User_ID`, `Consommation_ID`, `DateConsommation`, `Nombre`, `PrixVendu`) VALUES";
		
		//Ecriture des values avec foreach
		foreach ($saisie as $key => $value) {

		}
	}


?>
