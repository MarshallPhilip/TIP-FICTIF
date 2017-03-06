<?php
  include("head.php");
  $statut = $_GET['statut'];
  $consom = "";
  $prix = 0;
var_dump($_POST);
  //Les chiffres sont plus rapides pour identifier
  if(isset($_POST['0'])){

  }

?>

<!DOCTYPE HTML>
<html>
  <body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
      <h1>Saisir une consommation</h1>
      <label>Date</label><input type="text" name="date" value="<?php echo date("d/m/Y"); ?>" readonly="readonly"/><br/>

      <div>
        <fieldset>
           <legend>Liste des consommations</legend>
           <?php
            $listeConsom = consommation($consom);
            if($listeConsom != false)
            {

              foreach ($listeConsom as $key => $choix) {
                echo"$choix[$key].$choix[1].<br/><br/><br/><br/><br/><br/><br/><br/><br/>";
                //echo '<input type="checkbox" name="'.$choix[$key][0]." value=".'$choix.">'.$choix[$key][0].$choix[$key][1].'</input>';
                if($choix[0]%4 == 0 ){
                  echo '<br/>';
                }
              }
            }
            else
            {
              echo '<p>Erreur dans la génération de la liste de consommation</p>';
            }

           ?>
           <br/>
           <p>Prix: <?php echo $prix; ?>;
         </fieldset>
      </div>
      <input type="submit" name="valider" value="Valider"/>

    </form>
  </body>
</html>
