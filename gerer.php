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
    $users = [];

    //Action est envoye a la fnc extract user
    //dans le but de savoir quelle requete executer
    $action = "all";
    $users = extractUsers($action);
  ?>

    <!-- Tableau affichant les consommation d'un user pour users -->
    <div class="container">
      <h2>Gérer les utilisateurs</h2>
      <a class="btn btn-success" href="addUser?statut=<?php echo $statut; ?>">Ajouter un utilisateur</a><br/><br/>
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
          echo '<td><a class="btn-link" href="modifUser.php?statut='.$statut.'&idUser='.$value->ID.'">modifier</a></td>';
          echo '<td><a class="btn-link" href="deleteUser.php?statut='.$statut.'&idUser='.$value->ID.'">Supprimer</a></td>';
          echo '</tr>';
         }

       ?>
     </table>
     <a class="btn-link" href="indexAdmin.php?statut=<?php echo $statut; ?>">Retour</a>
    </div>



<?php
  require_once("footer.php");
  }
?>
