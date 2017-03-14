<?php

  $dbname = 'tpi-fictif';
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



 ?>
