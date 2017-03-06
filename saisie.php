<?php
  include("head.php");
  $statut = $_GET['statut'];
  $consom = "";

?>

<!DOCTYPE HTML>
<html>
  <body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="login">
      <h1>Saisir une consommation</h1>
      <label>Date</label><input type="text" name="date" value="<?php echo date("d/m/Y"); ?>" readonly="readonly"/><br/>

      <div>
        <fieldset>
           <legend>Liste des consommations</legend>
           <?php
            $listeConsom = consommation($consom);

            if($listeConsom != false)
            {
              var_dump($listeConsom);
              foreach ($listeConsom as $key => $choix) {
                echo '<input type="checkbox" name="'.$key." value=".'$choix.">'.$choix.'</input>';
                if($key%4 == 0){
                  echo '<br/>';
                }
              }
            }
            else
            {
              echo '<p>Erreur dans la génération de la liste de consommation</p>';
            }

           ?>
         </fieldset>
      </div>

      <input type="password" name='badge' placeholder="password"/>
      <input type="submit" name="valider" value="Valider"/>

    </form>
  </body>
</html>
