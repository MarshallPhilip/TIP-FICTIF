<?php
  require_once("../head.php");
  $statut = $_GET['statut'];

  if(isset($_POST['saisir'])){
    header("Location: ../saisie.php?statut=emp");
  }
  elseif(isset($_POST['voir'])){
    header("Location: mesAchats.php?statut=emp");
  }

?>

  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?statut=<?php echo $statut;?>">
    <input type="hidden" name="valide"/>
    <input type="submit" name="saisir" value="Saisir"/>
    <input type="submit" name="voir" value="Mes achats"/>
  </form>
<?php require_once("../footer.php"); ?>
