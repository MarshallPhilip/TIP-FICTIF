<?php
  require_once("head.php");
  //Verifie si un utilisateur est bien connecte et si il a le droit
  //d'acceder a cette page
  if(!isset($_SESSION['user'][0]) || (isset($_SESSION['user'][0]) && $_SESSION['user'][2] != "sup"))
  {
    if(isset($_SESSION['user'][0]))
    {
      session_destroy();
    }
    header("Location: index.php");
  }else
  {
    $statut = $_GET['statut'];
    $idUser = $_GET['idUser'];

    delUser($statut, $idUser);
  }

?>
