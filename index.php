<?php
    include("head.php");
    $error = 0;

    if(isset($_GET['error']))
    {
      $error = $_GET['error'];
    }
?>


<!DOCTYPE html>
<html>
  <form method="POST" action="login.php" id="login">
    <input type="password" name='badge' placeholder="Badge"/>
    <input type="submit" name="valider" value="Valider"/>
    <p>
      <?php if ($error == 1)
      {
      echo "Numéro de badge erroné";
      } ?>
  </p>
  </form>

</html>
