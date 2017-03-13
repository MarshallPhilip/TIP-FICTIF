<?php
  require_once("../head.php");
  $statut = $_GET['statut'];

  $users = extractUsers();
  var_dump($users);

?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>?statut=<?php echo $statut;?>">
  <SELECT name="user">
    <?php
      foreach ($users as $key => $user) {

        echo '<option value="">'.$user[2].' '.$user[1].'</option>';
      }

      ?>
  </SELECT>
</form>

<?php   require_once("../footer.php"); ?>
