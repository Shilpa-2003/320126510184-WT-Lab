<?php
	// connect to the database
 include "connection.php";
 session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      tr,td
      {
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <p style = "text-align:center;">Active Users</p>
       <table border="1px" style = "border-collapse:collapse;">
         <tr>
           <td>#</td>
           <td>User</td>
         </tr>
         <?php
          $i = 1;
          $a = mysqli_query($db,"SELECT * FROM `user`;");
          while($x = mysqli_fetch_row($a))
          {
            ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $x[0]; ?></td>
              </tr>
            <?php
            $i = $i + 1;
          }
          ?>
       </table>
       <script type="text/javascript">
       setTimeout(function(){
   window.location.reload();
    }, 5000);
       </script>
  </body>
</html>
