<?php
  require_once("head.php");
  $statut = $_GET['statut'];

  if(isset($_POST['saisir'])){
    header("Location: saisie.php?statut=emp");
  }
  elseif(isset($_POST['voir'])){
    header("Location: mesAchats.php?statut=emp");
  }

?>
<div class="container">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?statut=<?php echo $statut;?>">
    <input type="hidden" name="valide"/>
    <input class="btn" type="submit" name="saisir" value="Saisir"/>
    <input class="btn" type="submit" name="voir" value="Mes achats"/>
  </form>
</div>
<?php require_once("footer.php"); ?>
