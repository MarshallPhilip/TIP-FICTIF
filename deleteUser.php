<?php
  require_once("head.php");
  $statut = $_GET['statut'];
  $idUser = $_GET['idUser'];

  delUser($statut, $idUser);  
?>
