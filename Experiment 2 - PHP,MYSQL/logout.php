<?php
session_start();
include "connection.php";

 ?>
<?php
  if(isset($_SESSION['user']))
  {

    $q = mysqli_query($db,"DELETE FROM `user` WHERE username = '$_SESSION[user]';");
  
    unset($_SESSION['user']);
  }
  ?>

  <script type="text/javascript">
    window.location = "index.php";
  </script>