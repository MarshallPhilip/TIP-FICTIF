<?php
  require_once("head.php");
  if(!isset($_SESSION['user'][0]))
  {
    header("Location: index.php?error=0");
  }else
  {
    $statut = $_GET['statut'];
    //Permet de rediriger sur le bon index en fonction de qui est logué
    if($statut == "emp"){
      $retour = "indexStandard.php?statut=emp";
    }
    else{
      $retour = "indexAdmin.php?statut=".$statut;
    }
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
      if(!empty($conso))
      {
        foreach ($conso as $key => $value) {
          $concatConso[$i][0] = $key;
          $concatConso[$i][1] = $value;
          $i++;
        }
        //Cette fonction permet d'insérer les données dans la table
        //Plus de détails: aller dans la fnc
        Saisieconsommation($concatConso, $retour);
      }


    }

  ?>
  <div class="container">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
      <input type="hidden" name="valide"/>
      <h1>Saisir une consommation</h1>
      <label>Date du jour : </label><?php echo date("d/m/Y"); ?><br/>
      <div>
        <fieldset>
           <legend>Liste des consommations</legend>
           <table class="table table-responsive">
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
                  echo "<td>".$choix[1].' </td><td><input type="number" name="'.$choix[0].'"  min="0"></td>';
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
      <table>
        <tr>
          <td><input class="btn btn-submit" type="submit" name="valider" value="Valider"/></td>
          <td><a href="<?php echo $retour;?>">Retour</a></td>
        </tr>
      </table>

    </form>
  </div>
  <?php require_once("footer.php");
  }?>
