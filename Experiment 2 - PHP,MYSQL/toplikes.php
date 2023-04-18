<?php
session_start();
include "connection.php";

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
    tr,td
    {
      padding-right:50px;
color:white;
    }
    body
    {
        color:cadetblue;
    }
    input{
color:midnightblue;
}
.center{
  margin-left:auto;
  margin-right:auto;
}
    </style>
  </head>
  <body>
    <h3 style = "text-align:center;"><input type="button" style="text-align:center;background-color:yellow;height=100px;weight=100px"value="Top Likes"></h3>
   <table class="center" cellspacing = "20px">
     <tr>
       <center><td><input type="button" style="text-align:center;background-color:aquamarine;height=100px;weight=100px" value="Sno"></td></center>
       <center><td><input type="button" style="text-align:center;background-color:aquamarine;height=100px;weight=100px" value="Username"></td></center>
       <center><td><input type="button" style="text-align:center;background-color:aquamarine;height=100px;weight=100px" value="Photo"></td></center>
       <center><td><input type="button" style="text-align:center;background-color:aquamarine;height=100px;weight=100px" value="Likes"</td></center>
      <!-- <center><td><input type="button" style="text-align:center;background-color:aquamarine;height=100px;weight=100px" value="Comments"</td></center>-->
     </tr>
     <?php
          $i = 1;
     $q = mysqli_query($db,"SELECT Username,image,likes,id from fb_upload where likes != 0   order by likes DESC limit 4;");
      ?>
      <?php while($row = mysqli_fetch_row($q))
      { ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo $row[0]; ?></td>
        <td> <img style = "border: 1px solid white;" src="uploads/<?php echo $row[1]; ?>" width = "80px" height = "80px" > </td>
         <td><?php echo $row[2]; ?></td>
         <!--<td>
           <?php
           $c = $row[3];
           $t = mysqli_query($db,"SELECT count(*) from `comments` where postid = $c;");
           while($r3 = mysqli_fetch_array($t))
             {
                  echo $r3[0];

             }
            ?>
         </td>-->
      </tr>
    <?php } ?>
   </table>
  </body>
</html>