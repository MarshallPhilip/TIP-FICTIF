<?php
  require_once("head.php");
  //Verifie si un utilisateur est bien connecte et si il a le droit
  //d'acceder a cette page
  if(!isset($_SESSION['user'][0]))
  {
    header("Location: index.php?error=0");
  }else
  {
    $statut = $_GET['statut'];

    $achats = mesAchats();
  ?>

  <div class="container">
    <h2>Mes achats</h2>
    <table class="table table table-striped">
    <?php
      //Affichage de la liste des articles de consommation
      foreach ($achats as $key => $value) {
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

        echo '</tr>';


       }
     ?>
   </table>
   <a href="indexStandard.php?statut=<?php echo $statut;?>">Retour</a>
  </div>
<?php
  require_once("footer.php");
}
?>
