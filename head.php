<?php
  session_start();
  require_once("MySQL.php");
  if(isset($_GET['statut'])){
    $statut = $_GET['statut'];
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
    <meta charset="utf-8">
    <title>TPI-FICTIF</title>
  </head>
  <header>
    Connecté en tant que
    <?php
      if(isset($_SESSION['user'][0]))
      echo  $_SESSION['user'][0]; 
    ?>
    <?php
      if(isset($statut)){
        echo '<form method="post" action="../login/login.php?statut='.$statut.'">';
        echo '<input type=submit name="deconnect" value="Se déconnecter"/>';
        echo '</form>';
      }
    ?>
  </header>
  <body>
