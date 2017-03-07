<?php
  require_once("head.php");
  $statut = $_GET['statut'];
?>
<!DOCTYPE HTML>
<html>
  <form method="POST" action=".php">
    <input type="submit" name="saisir" value="Saisir"/>
    <input type="submit" name="Factures" value="Factures"/>
    <?php if ($statut == "sup")
    {
      echo '<input type="submit" name="Users" value="Gérer les utilisateurs"/>';
    } ?>

  </form>
</html>
