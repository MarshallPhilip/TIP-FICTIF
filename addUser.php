<?php
  require_once("head.php");
  $statut = $_GET['statut'];



  if(isset($_POST['valide']))
  {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $badge = $_POST['badge'];
    $statutUser = $_POST['statut'];

    addUser($nom, $prenom, $badge, $statutUser, $statut);

  }

?>
<div class="container">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
    <input type="hidden" name="valide"/>

    <div class="container">
      <h2>Ajouter un utilisateur</h2>

      <table class="table table table-striped">
        <tr>
        <td><input type="text" name="nom"></input></td>
        <td><input type="text" name="prenom"></input></td>
        <td><input type="text" name="badge" maxlength="4"></input></td>
        <td>
        <select name="statut">
          <option value ="emp">employé</option>
          <option value ="cai">caissier</option>
          <option value ="sup">superviseur</option>
        </select>
        </td>
        </tr>

   </table>


    <table>
      <tr>
        <td><input type="submit" name="valider" value="Créer"/></td>
        <td><a href="<?php echo "gerer.php?statut=".$statut;?>">Retour</a></td>
      </tr>
    </table>

  </form>
</div>
<?php require_once("footer.php"); ?>
