<?php
    require_once("head.php");
    $error = 0;
    if(isset($_GET['error']))
    {
      $error = $_GET['error'];
    }
?>

<div class="container center">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <h2>Se connecter</h2>

            <form method="POST" action="login.php" id="login">
              <input class="form-control" type="password" name='badge' placeholder="Badge" maxlength="4"/><br/>
              <input class="btn" type="submit" name="valider" value="Valider"/>
              <p>
                <?php if ($error == 1)
                {
                echo "Numéro de badge erroné";
                } ?>
            </p>
            </form>
          </div>
      </div>
</div>
<?php require_once("footer.php"); ?>
