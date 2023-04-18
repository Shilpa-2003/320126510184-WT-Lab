<?php include "connection.php"; ?>
</head>
 <body>
   <table border = 1 cellspacing = 0 cellpadding = 10>
     <tr>
       <td>Sno</td>
       <td>Name</td>
       <td>Image</td>
     </tr>
     <?php
     $i = 1;
     $rows = mysqli_query($db, "SELECT * FROM fb_upload ORDER BY id DESC");
     ?>

     <?php foreach ($rows as $row) : ?>
     <tr>
       <td><?php echo $i++; ?></td>
       <td><?php echo $row["name"]; ?></td>
       <td> <img src="uploads/<?php echo $row["image"]; ?>" width = 200 title="<?php echo $row['image']; ?>"> </td>
     </tr>
     <?php endforeach; ?>
   </table>
   <br>
   <a href="uploads/uploadimagefile">Upload Image File</a>
 </body>
</html>