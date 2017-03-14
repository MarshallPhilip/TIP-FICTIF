<?php
  require_once("head.php");
  $statut = $_GET['statut'];
  $facture = [];

  //Action est envoye a la fnc extract user
  //dans le but de savoir quelle requete executer
  $action = 0;
  $users = extractUsers($action);

  //Teste si un utilisateur a deja ete selectionne et si oui on genere la facture
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
    <select name="users" onchange="document.getElementById('form').submit();">
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
    </select>
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
        echo '<td>';
        echo $value->Nom;
        echo '</td>';
        echo '<td>';
        echo $value->DateConsommation;
        echo '</td>';
        echo '<td>';
        echo $value->Nombre;
        echo '</td>';
        echo '<td>';
        echo $value->PrixVendu;
        echo '</td>';



          echo '</td>';

        //Key correspond a l'ID dans la table value
        echo '<td><a class="btn-link" href="saisieModif.php?statut='.$statut.'&idConsomme='.$facture[$key]->IDConsomme.'&idArt='.$facture[$key]->ID.'&idFacture='.$key.'">modifier</a></td>';
        echo '</tr>';


       }
    }

   ?>
 </table>
 <a class="btn-link" href="indexAdmin.php?statut=<?php echo $statut; ?>">Retour</a>
</div>

<?php   require_once("footer.php"); ?>