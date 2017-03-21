<?php
    require_once("head.php");
    //Verifie si un utilisateur est bien connecte et si il a le droit
    //d'acceder a cette page
    if(!isset($_SESSION['user'][0]) || (isset($_SESSION['user'][0]) && ($_SESSION['user'][2] != "cai" || $_SESSION['user'][2] != "sup")))
    {
      if(isset($_SESSION['user'][0]))
      {
        session_destroy();
      }
      header("Location: index.php");
    }else
    {

    $statut = $_GET['statut'];
    $facture = [];

    //Action est envoye a la fnc extract user
    //dans le but de savoir quelle requete executer
    $action = "list";
    $users = extractUsers($action);

    //Teste si un utilisateur a deja ete selectionne et si oui on genere la facture
    if(isset($_POST['users']) && $_POST['users'] != "choisir")
    {
      $facture = facture($_POST['users']);
      //Je mets facture dans une session pour la récupérer dans saisieModif
      $_SESSION['facture'] = $facture;
    }else
    {
      //Session user 1 qui contient l'ID de la personne connectee
      //Ca permet d'afficher sa facture par defaut
      $facture = facture($_SESSION['user'][1]);
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
            foreach ($users as $key => $value) {
              //Recursivite
              //La value contient l'ID de l'utilisateur dans la table user
              if(isset($_POST['users']) && $_POST['users'] == $value->ID)
              {
                echo '<option value="'.$value->ID.'" selected>'.$value->Nom.' '.$value->Prenom.'</option>';
              }else
              {
                echo '<option value="'.$value->ID.'">'.$value->Nom.' '.$value->Prenom.'</option>';
              }

            }

            ?>
        </select>
      </div>
      </form>
    </div>
    <!-- Tableau affichant les consommation d'un user pour facture -->
    <div class="container">
      <h2>Facture en attente</h2>
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



<?php
  require_once("footer.php");
}

?>
