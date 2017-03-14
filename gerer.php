<?php
  require_once("head.php");
  $statut = $_GET['statut'];
  $users = [];

  //Action est envoye a la fnc extract user
  //dans le but de savoir quelle requete executer
  $action = 1;
  $users = extractUsers($action);
  var_dump($users);
?>

<!-- Tableau affichant les consommation d'un user pour users -->
<div class="container">
  <h2>Gérer les utilisateurs</h2>
  <table class="table table table-striped">
  <?php

    foreach ($users as $key => $value) {
      echo '<tr>';
      echo '<td>';
      echo $value->Nom;
      echo '</td>';
      echo '<td>';
      echo $value->Prenom;
      echo '</td>';
      echo '<td>';
      echo $value->Badge;
      echo '</td>';
      echo '<td>';
      switch ($value->Statut) {
        case 'emp':
          echo "employé";
          break;
        case 'cai':
            echo "caissier";
          break;
        case 'sup':
            echo "superviseur";
          break;

        default:
          # code...
          break;
      }
      echo '</td>';

      //Key correspond a l'ID dans la table value
      //echo '<td><a class="btn-link" href="saisieModif.php?statut='.$statut.'&idConsomme='.$users[$key]->IDConsomme.'&idArt='.$users[$key]->ID.'&idusers='.$key.'">modifier</a></td>';
      echo '</tr>';

     }

   ?>
 </table>
 <a class="btn-link" href="indexAdmin.php?statut=<?php echo $statut; ?>">Retour</a>
</div>

<?php   require_once("footer.php"); ?>
