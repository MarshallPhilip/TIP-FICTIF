<?php
  require_once("head.php");
  $statut = $_GET['statut'];
  //tr pour le tableau permet de retourner à la ligne après 4 art. de consom.
  $tr = false;
  //S'incrémente à chaque nouvelle saisie dans tableau consom. rempli avec var POST
  $i = 1;
  //Les chiffres sont plus rapides pour identifier
  if(isset($_POST['valide'])){

    // DEBUT
    //On filtre: je souhaite n'avoir que les ID d'articles, donc du numérique
    $conso = array_filter($_POST, function($v, $k){
      return !empty($v) && is_numeric($v);
    }, ARRAY_FILTER_USE_BOTH);
    //Tableau 2 dimensions avec key comme ID d'art. comme dans la bd
    //Et value comme le nombre choisi (ex: 2 cocas)
    foreach ($conso as $key => $value) {
      $concatConso[$i][0] = $key;
      $concatConso[$i][1] = $value;
      $i++;

    }
    //Cette fonction permet d'insérer les données dans la table
    //Plus de détails: aller dans la fnc
    Saisieconsommation($concatConso);
  }

?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
    <input type="hidden" name="valide"/>
    <h1>Saisir une consommation</h1>
    <label>Date</label><input type="text" name="date" value="<?php echo date("d/m/Y"); ?>" readonly="readonly"/><br/>
    <div>
      <fieldset>
         <legend>Liste des consommations</legend>
         <table>
         <?php
         //Affichage de la liste des articles de consommation
          $listeConsom = Listeconsommation();
          if($listeConsom != false)
          {
              foreach ($listeConsom as $key => $choix) {
                //Le if permet l'ouverture d'une nouvelle ligne dans le tab
                //au bon moment voir modulo
                if($tr == true){
                  echo '<tr>';
                  $tr = false;
                }
                echo "<td>".$choix[1].' <input type="number" name="'.$choix[0].'"  min="0"></td>';
                  //Permet de fermer la ligne après 4 articles (4 par 4)
                if($choix[0]%4 == 0 ){
                  echo '</tr>';
                  $tr = true;
                }
              }
          }
          else
          {
            echo '<p>Erreur dans la génération de la liste de consommation</p>';
          }
         ?>
       </table>
       </fieldset>
    </div>
    <input type="submit" name="valider" value="Valider"/>
  </form>
<?php require_once("footer.php"); ?>
