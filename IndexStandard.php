<?php
  require_once("head.php");
  //Verifie si un utilisateur est bien connecte et si il a le droit
  //d'acceder a cette page
  if(!isset($_SESSION['user'][0]))
  {
    header("Location: index.php?error=0");
  }else
  {
    $statut = $_GET['statut'];

    if(isset($_POST['saisir'])){
      header("Location: saisie.php?statut=emp");
    }
    elseif(isset($_POST['voir'])){
      header("Location: mesAchats.php?statut=emp");
    }

  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>?statut=<?php echo $statut;?>">
            <h2>Choisir</h2>
            <input type="hidden" name="valide"/>
            <input class="btn" type="submit" name="saisir" value="Saisir"/>
            <input class="btn" type="submit" name="voir" value="Mes achats"/>
          </form>
        </div>
      </div>
    </div>
<?php
  require_once("footer.php");
  }
?>
