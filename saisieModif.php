<?php
  require_once("head.php");
  //Verifie si un utilisateur est bien connecte et si il a le droit
  //d'acceder a cette page
  if(!isset($_SESSION['user'][0]) || (isset($_SESSION['user'][0]) && ($_SESSION['user'][2] != "sup" || $_SESSION['user'][2] != "sup")))
  {
    if(isset($_SESSION['user'][0]))
    {
      session_destroy();
    }
    header("Location: index.php");
  }else
  {
    $statut = $_GET['statut'];


    //Recuperation GET
    $iArt = $_GET['idArt']; //ID table articles
    $iConsomme = $_GET['idConsomme']; //ID table consommble
    $facture = $_SESSION['facture']; //Tableau factures vu avant
    $idFacture = $_GET['idFacture']; //Recup ID tableau factures correspondant ligne a modif


    if(isset($_POST['choix'])){
      $conso = array_filter($_POST, function($v, $k){
        return !empty($v) && is_numeric($v);
      }, ARRAY_FILTER_USE_BOTH);
    editConsom($conso['choix'], $iConsomme, $statut);


    }
  ?>
  <div class="container">
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>&&idConsomme=<?php echo $iConsomme;?>&idArt=<?php echo $iArt;?>&idFacture=<?php echo $idFacture;?>">
      <input type="hidden" name="valide"/>
      <h1>Modifier une consommation</h1>
      <label>Date de consommation : </label><?php echo $facture[0]->DateConsommation; ?><br/>
      <div>
      <fieldset>
        <table>
          <?php
            $listeConsom = Listeconsommation();
              if($listeConsom != false)
              {
                foreach ($listeConsom as $key => $choix) {
                  //Je teste choix avec article car on l'a extrait avant dans les factures
                  echo '<tr>';
                  if($choix[0] == $iArt ){
                    echo "<td>".$choix[1].' <input type="number" name="choix" value="'.$facture[$idFacture]->Nombre.'" min="0"></td>';
                  }
                  echo '</tr>';
                }

            }else
            {
              echo '<p>Erreur dans la génération de la liste de consommation</p>';
            }
             ?>
         </table>
         </fieldset>
      </div>
      <table>
        <tr>
          <td><input type="submit" name="valider" value="Valider"/></td>
          <td><a href="<?php echo "factures.php?statut=".$statut;?>">Retour</a></td>
        </tr>
      </table>

    </form>
  </div>
<?php
  require_once("footer.php");
}
?>
