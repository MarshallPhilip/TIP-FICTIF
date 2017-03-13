<?php
  require_once("head.php");
  $statut = $_GET['statut'];
  $facture = [];
  $users = extractUsers();

  if(isset($_POST['users']) && $_POST['users'] != "choisir"){
    $facture = facture($_POST['users']);
    //Je mets facture dans une session pour la récupérer dans saisieModif
    $_SESSION['facture'] = $facture;
  }

?>
<div class="container">
  <form id="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
  <div class="form-group">
    <!-- Plus besoin de valider, ca le fait automatiquement -->
    <SELECT name="users" onchange="document.getElementById('form').submit();">
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
        //i correspond à l'ID de la table generee par la requete
        //Je le commence a 1 pour ne pas afficher l'ID
        //Le 5 représente le nombre de cellules par ligne
        for($i=2; $i<6; $i++){
          echo '<td>';
          if($i == 5 && $value[$i] == 0)
          {
            echo 'pas facturé';
          }elseif($i == 5 && $value[$i] == 1)
          {
            echo 'payé';
          }else
          {
            echo $value[$i];
          }

          echo '</td>';
        }
        //Key correspond a l'ID dans la table value
        echo '<td><a class="btn-link" href="saisieModif.php?statut='.$statut.'&idConsomme='.$facture[$key][0].'&idArt='.$facture[$key][1].'&idFacture='.$key.'">modifier</a></td>';
        echo '</tr>';


       }
    }

   ?>
 </table>
 <a class="btn-link" href="indexAdmin.php?statut=<?php echo $statut; ?>">Retour</a>
</div>

<?php   require_once("footer.php"); ?>
