<?php
  include("head.php");
  $statut = $_GET['statut'];
?>
<!DOCTYPE HTML>
<html>
  <form method="POST" action=".php">
    <input type="submit" name="saisir" value="Saisir"/>
    <input type="submit" name="Factures" value="Factures"/>
    <input type="submit" name="Users" value="Gérer les utilisateurs"/>
    <p>
      <?php if ($error == 1)
      {
      echo "Numéro de badge erroné";
      } ?>
  </p>
  </form>
</html>
