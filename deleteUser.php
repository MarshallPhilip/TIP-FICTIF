<?php
  require_once("head.php");
  if(!isset($_SESSION['user'][0]))
  {
    header("Location: index.php?error=0");
  }else
  {
    $statut = $_GET['statut'];
    $idUser = $_GET['idUser'];

    delUser($statut, $idUser);  
  }

?>
