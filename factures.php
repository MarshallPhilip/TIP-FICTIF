<?php
  require_once("head.php");
  $statut = $_GET['statut'];
  $facture = [];
  $users = extractUsers();

  if(isset($_POST['users']) && $_POST['users'] != "choisir"){
    $facture = facture($_POST['users']);
  }

?>
<div class="container">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
  <div class="form-group">
    <SELECT name="users">
      <option class="form-control" value="choisir">Sélectionner utilisateur</option>
      <?php
        //Permet d'afficher la liste des utilisateurs que nous avons extraits dans MySQL.php
        foreach ($users as $key => $user) {
          //Recursivite
          if(isset($_POST['users']) && $_POST['users'] == $user[0])
          {
            echo '<option value="'.$user[0].'" selected>'.$user[2].' '.$user[1].'</option>';
          }else
          {
            echo '<option value="'.$user[0].'">'.$user[2].' '.$user[1].'</option>';
          }

        }

        ?>
    </SELECT>
    <input class="btn btn-primary" type="submit" name="valider" value="Valider"/>
  </div>
  </form>
</div>
<!-- Tableau affichant les consommation d'un user pour facture -->
<div class="container">
  <h2>Facture de XXX</h2>
  <table class="table table table-striped">
  <?php
    //Affichage de la liste des articles de consommation
    //Uniquement si l'utilisateur a consommé qqch
    //Sinon message "aucune consomm..."
    if(is_string($facture)){
      echo $facture;
    }else
    {
      foreach ($facture as $key => $value) {
        echo '<tr>';
        for($i=0; $i<5; $i++){
          echo '<td>';
          if($i == 4 && $value[$i] == 0)
          {
            echo 'pas payé';
          }elseif($i == 4 && $value[$i] == 1)
          {
            echo 'payé';
          }else
          {
            echo $value[$i];
          }

          echo '</td>';
        }

        echo '<td><a class="btn-link">modifier</a></td>';
        echo '</tr>';


       }
    }

   ?>
 </table>
 <a class="btn-link" href="indexAdmin.php?statut=<?php echo $statut; ?>">Retour</a>
</div>

<?php   require_once("footer.php"); ?>
