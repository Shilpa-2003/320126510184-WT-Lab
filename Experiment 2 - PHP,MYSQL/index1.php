<?php
session_start();
include "connection.php";

 ?>
 <?php
 if(isset($_SESSION['user']))
 {
  ?>
     <!DOCTYPE html>
     <html lang="en" dir="ltr">
       <head>
         <meta charset="utf-8">
         <title></title>
         <style media="screen">
         html,body
         {background-color:grey;
           height:100%;
         }
           .top
           {
             width:100%;
             height: 50px;

           }
           .top button
           {
             position: relative;
             top:25px;
             float: right;
color:green;
           }
           .top h1
           {
text-shadow: 0 1px 0 #ccc, 0 2px 0 #ccc,
                     0 3px 0 #ccc, 0 4px 0 #ccc,
                     0 5px 0 #ccc, 0 6px 0 #ccc,
                     0 7px 0 #ccc, 0 8px 0 #ccc,
                     0 9px 0 #ccc, 0 10px 0 #ccc,
                     0 11px 0 #ccc, 0 12px 0 #ccc,
                     0 20px 30px rgba(0, 0, 0, 0.5);
    
             display: inline-block;
             margin: auto;
             position: relative;
             left:40%;
           }
           body
           {background-color:grey;
             height: 100%;
           }
           .b1
           {
             display: flex;
           width:100%;
           height:100%;
             border:2px solid black;
           }
           .b2
           {
             flex:1;
           color:red;
           height:100%;
           border:2px solid black;
           }
           .b3
           {
             flex:3;
             height:100%;

             border:2px solid black;
           }
           body
           {
             //background-image: url("maldieves.jpg");
             background-repeat: no-repeat;
             background-size: cover;
           background-color:grey;
           }
header{
background-color:lightpink;}
         </style>
       </head>
       <header class = "top">
         <?php
              if(isset($_SESSION['user']))
              {
                echo "<h1> Welcome ".$_SESSION['user']."</h1>";
              }
           ?>
         <button type="button" name="button" class = "button">  <a href="logout.php">Logout</a></button>

       </header>
       <body>
        <div class="b1">
          <div class="b2">
             <iframe src="left.php" width="100%" height="100%"></iframe>
          </div>
          <div class="b3">
             <iframe src="view.php" width="100%" height="100%" name = "right"></iframe>
          </div>

        </div>
       </body>
     </html>
  <?php

}else {
  echo "<h1> Please Login</h1>";
  ?>
 <a href="index.php">Login</a>
  <?php
}

  ?>