<?php
  require_once("head.php");
  $statut = $_GET['statut'];

  $selectedEmp = "";
  $selectedCai = "";
  $selectedSup = "";
  //Recuperation GET
  $iUser = $_GET['idUser'];

  //Dans ce cas, on envoie iUser pour extraire le user que nous voulons voir
  $users = extractUsers($iUser);

  if(isset($_POST['valide']))
  {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $badge = $_POST['badge'];
    $statutUser = $_POST['statut'];

    editUser($id, $nom, $prenom, $badge, $statutUser, $statut);
  }

?>
<div class="container">
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
    <input type="hidden" name="valide"/>

    <div class="container">
      <h2>Modifier un utilisateur</h2>
      <table class="table table table-striped">
      <?php
        foreach ($users as $key => $value) {
          echo '<input type="hidden" name="id" value ="'.$value->ID.'"/>';
          echo '<tr>';
          echo '<td><input name="nom" value="'.$value->Nom.'"></input></td>';
          echo '<td><input name="prenom" value="'.$value->Prenom.'"></input></td>';
          echo '<td><input name="badge" value="'.$value->Badge.'"></input></td>';
          echo '<td>';
          echo '<select name="statut">';
          switch ($value->Statut) {
            case 'emp':
              $statutFull = "employé";
              $selectedEmp = 'selected';
              break;
            case 'cai':
                $statutFull = "caissier";
                $selectedCai = 'selected';
              break;
            case 'sup':
                $statutFull = "superviseur";
                $selectedSup = 'selected';
              break;
          }
          //On ne peut pas encore modifier le statut, revoir liste options
          echo '<option value ="emp" '.$selectedEmp.'>employé</option>';
          echo '<option value ="cai" '.$selectedCai.'>caissier</option>';
          echo '<option value ="sup" '.$selectedSup.'>superviseur</option>';
          echo '</select>';
          echo '</td>';
          echo '</tr>';

         }

       ?>
     </table>


    <table>
      <tr>
        <td><input type="submit" name="valider" value="Modifier"/></td>
        <td><a href="<?php echo "gerer.php?statut=".$statut;?>">Retour</a></td>
      </tr>
    </table>

  </form>
</div>
<?php require_once("footer.php"); ?>
