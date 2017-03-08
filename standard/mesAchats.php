<?php
  require_once("../head.php");
  $statut = $_GET['statut'];

  $achats = mesAchats();
?>

<div>
  <h1>Mes achats</h1>
  <table>
  <?php
    //Affichage de la liste des articles de consommation
    foreach ($achats as $key => $value) {
      echo '<tr>';
      for($i=0; $i<5; $i++){
        echo '<td>';
        echo $value[$i];
        echo '</td>';
      }

      echo '</tr>';


     }
   ?>
 </table>
 <a href="indexStandard.php?statut=<?php echo $statut;?>">Retour</a>
</div>
<?php require_once("../footer.php"); ?>
