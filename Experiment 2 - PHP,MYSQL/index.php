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
      html,body
      {
        height:100%;
      }
      body
      {background-color:#1876f2;
        background-imag: url("uploads/bg1.png");
        background-repeat: no-repeat;
        background-size: cover;
        color:white;
      }
      .b1
      {
        width:100%;
        height:100px;
        border:2px solid white;
        background-color:#1876f2;
      }
      .b1 h1
      {
        text-align:center;
        margin-top:0px;
      }
      .b2
      {
        flex:3;
        height:100%;
        width:50%;
       
      }
      .b3
      {
          flex:1;
width:50%;
        height:100%;
        border:2px solid white;

      }
      .main
      {
          display: flex;
        width:100%;
        height:100%;

      }
      .b5 table
      {
        margin:auto;
        padding-top:80px;
      }
      .b4
      {
        width:100%;
        height:25%;
        background-color:pink;
      }
      .b5
      {
        width:60%;
        margin:auto;
        height:50%;

      }
      .b6
      {
        width:100%;
        height:25%;
        background-color:;
      }
p{
background-color:orange;
}
img{
  margin-left:650px;
  margin-top:10px;
}
    </style>
  </head>
  <body>
    <div class="b1">
      <img src="uploads/logo1.png"  style="width:40px;height:40px;">
      <h1>Welcome To My FaceBook</h1>
    </div>
    <div class="main">
      <div class="b2">
        <iframe src="toplikes.php" width="100%" height="100%" frameborder = 0 name = "likes"></iframe>
      </div>
      <div class="b3">
        <!-- <div class="b4">
                 <img src="uploads/logo1.png" alt="" height = "80px" width = "80px">
         </div>-->
         <div class="b5">
          <form class="" action="index.php" method="post">
            <table cellpadding = "10px">
              <tr>
                <td>
                  <p style = "text-align:center;">Login Here</p>
                </td>

              </tr>
              <tr>
                <td>

                <input type="text" name="username" placeholder="Username" value="<?php if(isset($_COOKIE["user"])){  echo $_COOKIE['user']; } ?>" required = "required">
                </td>
                </tr><tr>

                <td>
                <input type="password" name="password" placeholder="Password" required = "required" value="<?php if(isset($_COOKIE["user"])){  echo $_COOKIE['pass']; } ?>">
                </td>

              </tr>
              <tr>
                <td>
                      <label>  <input type="checkbox" name="remember" <?php if(isset($_COOKIE["user"])){  echo "checked"; } ?> class="largerCheckbox">&nbsp &nbsp  Remember me</label>
                </td>
              </tr>
              <tr>
                <td
                <p style = "text-align:center;">
                  <input type="submit" name="submit"style="background-color:aqua;" value="Login"> &nbsp or &nbsp
                  <button type="button" style="background-color:aqua;" name="button"><a href="reg.php" style = "background-color:aqua;" target = "likes">Sign Up</a></button>
                </p>
              </td>
              </tr>

            </table>
          </form>
         </div>
         <?php
                if(isset($_POST['submit']))
                {
                  $q = mysqli_query($db,"SELECT * FROM `registration` where username = '$_POST[username]' and password = '$_POST[password]';");

                  $count = mysqli_fetch_row($q);

                  if($count == 0)
                  {
                    ?>  <script type="text/javascript">
                        alert("Incorrect Username or Password");
                      </script>

                    <?php
                  }else {

                    if($_POST['remember'])
                    {
                      setcookie('user',$_POST['username'],time() + (86400 * 30));
                      setcookie('pass',$_POST['password'],time() + (86400 * 30));
                    }

                    $_SESSION['user'] = $_POST['username'];
                    if(is_null($_SESSION['user']))
                    {
                      echo "";
                    }else
                    {
                        mysqli_query($db,"INSERT INTO `user` VALUES('$_SESSION[user]');");
                    }

                    ?>
                    <script type="text/javascript">

                      window.location = "index1.php";
                    </script>
                    <?php
                  }
                }

          ?>
         <div class="b6">

         </div>
      </div>
    </div>

  </body>
</html>