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

    $selectedEmp = "";
    $selectedCai = "";
    $selectedSup = "";
    $confirm = "";
    $admin = false;
    $errorBadge = false;
    //Recupe ration GET
    if(isset($_GET['idUser']))
    {
      $id = $_GET['idUser'];
    }elseif(isset($_POST['valide']))
    {
      $id = $_POST['id'];
    }


    //Dans ce cas, on envoie iUser pour extraire le user que nous voulons voir
    $users = extractUsers($id);

    if(isset($_POST['valide']))
    {
      $id = $_POST['id'];
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $badge = $_POST['badge'];
      $statutUser = $_POST['statut'];


      $confirm = editUser($id, $nom, $prenom, $badge, $statutUser, $statut);

      if($confirm == 0)
      {

        echo '<script>alert("Utilisateur modifié")</script>';
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
        <h2>Modifier un utilisateur</h2>
        <table class="table table table-striped">
        <?php
          foreach ($users as $key => $value) {
            echo '<input type="hidden" name="id" value ="'.$value->ID.'"/>';
            echo '<tr>';
            echo '<td>Nom : <input name="nom" value="'.$value->Nom.'" minlength="2" maxlength="255"></input></td>';
            echo '<td>Prénom : <input name="prenom" value="'.$value->Prenom.'" minlength="2" maxlength="255"></input></td>';
            if($errorBadge){
              echo '<td>Badge : <input name="badge" value="'.$value->Badge.'" minlength="4" maxlength="4"></input><br/>'
              .'Ce numéro de badge existe déjà</td>';
            }else
            {
              echo '<td>Badge : <input name="badge" value="'.$value->Badge.'" minlength="4" maxlength="4"></input></td>';
            }
            echo '<td>Statut : ';
            switch ($value->Statut) {
              case 'emp':
                $selectedEmp = 'selected';
                break;
              case 'cai':
                  $selectedCai = 'selected';
                break;
              case 'sup':
                  $selectedSup = 'selected';
                  $admin = true;
                break;
            }
            if(!empty($admin))
            {
              echo 'superviseur';
            }else
            {
              echo '<select name="statut">';
              echo '<option value ="emp" '.$selectedEmp.'>employé</option>';
              echo '<option value ="cai" '.$selectedCai.'>caissier</option>';
              echo '<option value ="sup" '.$selectedSup.'>superviseur</option>';
              echo '</select>';
            }


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
<?php
  require_once("footer.php");
}
?>
