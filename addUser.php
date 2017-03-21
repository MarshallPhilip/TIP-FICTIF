<?php
  require_once("head.php");
  //Verifie si un utilisateur est bien connecte et si il a le droit
  //d'acceder a cette page
  if(!isset($_SESSION['user'][0]) || (isset($_SESSION['user'][0]) && $_SESSION['user'][2] != "sup"))
  {
    if(isset($_SESSION['user'][0]))
    {
      session_destroy();
    }
    header("Location: index.php");
  }else
  {
    $statut = $_GET['statut'];

    $confirm = "";
    $errorBadge = false;
    $valide = false;

    if(isset($_POST['valide']))
    {
      $valide = true;
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $badge = $_POST['badge'];
      $statutUser = $_POST['statut'];

      $confirm = addUser($nom, $prenom, $badge, $statutUser, $statut);
      //Si 0, user Cree
      // 1 = probleme dans la requete
      // 2 = Numero de badge existant
      if($confirm == 0)
      {
        echo '<script>alert("Utilisateur créé")</script>';
        header("Location: gerer.php?statut=$statut");
      }elseif($confirm == 1)
      {
        echo '<script>alert("Impossible de créer cet utilisateur!")</script>';
        header("Location: gerer.php?statut=$statut");
      }elseif($confirm == 2)
      {
        $errorBadge = true;
      }

    }

?>
      <div class="container">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
          <input type="hidden" name="valide"/>

          <div class="container">
            <h2>Ajouter un utilisateur</h2>

            <table class="table table table-striped">
              <tr>
              <td>Nom: <input value="<?php if($valide){echo $nom;} ?>" type="text" name="nom" minlength="1"></input></td>
              <td>Prénom: <input value="<?php if($valide){echo $prenom;} ?>" type="text" name="prenom" minlength="1" ></input></td>
              <td>Badge: <input value="<?php if($valide){echo $badge;} ?>" type="text" name="badge" minlength="4" maxlength="4"></input><br/>
              <?php if($errorBadge){ echo "Ce numéro de badge existe déjà";} ?>
              </td>
              <td>Statut:
              <select name="statut">
                <option value ="emp" <?php if($valide == true && $statutUser == "emp"){echo 'selected';} ?>>employé</option>
                <option value ="cai" <?php if($valide == true && $statutUser == "cai"){echo 'selected';} ?>>caissier</option>
                <option value ="sup" <?php if($valide == true && $statutUser == "sup"){echo 'selected';} ?>>superviseur</option>
              </select>
              </td>
              </tr>

         </table>


          <table>
            <tr>
              <td><input class="btn btn-success" type="submit" name="valider" value="Créer"/></td>
              <td><a href="<?php echo "gerer.php?statut=".$statut;?>">Retour</a></td>
            </tr>
          </table>

        </form>
      </div>


<?php
  require_once("footer.php");
}
?>
