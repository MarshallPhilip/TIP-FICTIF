<?php
  require_once("head.php");
  //Verifie si un utilisateur est bien connecte et si il a le droit
  //d'acceder a cette page
  if(!isset($_SESSION['user'][0]) || (isset($_SESSION['user'][0]) && $_SESSION['user'][2] == "emp"))
  {
    if(isset($_SESSION['user'][0]))
    {
      session_destroy();
    }
    header("Location: index.php");
  }else
  {


    $statut = $_GET['statut'];

    if(isset($_POST['saisir'])){
      header("Location: saisie.php?statut=".$_GET['statut']."");
    }elseif (isset($_POST['factures'])) {
      header("Location: factures.php?statut=".$_GET['statut']."");
    }elseif (isset($_POST['gerer'])) {
      header("Location: gerer.php?statut=".$_GET['statut']."");
    }
  ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
            <h2>Choisir</h2>
            <input type="hidden" name="valide"/>
            <input class="btn" type="submit" name="saisir" value="Saisir"/>
            <input class="btn" type="submit" name="factures" value="Factures"/>
            <?php if ($statut == "sup")
            {
              echo '<input class="btn" type="submit" name="gerer" value="Gérer les utilisateurs"/>';
            } ?>

          </form>
        </div>
      </div>
    </div>
<?php
  require_once("footer.php");
  }
?>
