<?php include "connection.php"; ?>
<html>
    <head>
        <title>Forms</title>
        <style>
            body
            {
                background-color:aqua;
                text-align:center;
                color:darkorchid;
            }
        </style>  
    </head>
    <body>
        <h1>for sign up</h1>
        <h3>Please enter your details</h3>
        <form name="f1" action="signup.php" method="post">
        <table align="center">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="nm" placeholder="Enter your name" maxlength="30" required="required">
                </td>
            </tr>
   <tr>
                <td>date of birth:</td>
                <td><input type="date" name="dob" required="'required">
                </td>
            </tr>
            <tr>
                <td>Contact</td>
                <td>
                <input type="text" name="mb" placeholder="Enter mobileno" maxlength="10" required="required">
                </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gen" required="required" value="Male">M
                    <input type="radio" name="gen" required="required" value="Female">F
                </td>
            </tr>
            <tr>
                <td>Email Id</td>
                <td>
                    <input type="email" name="em" placeholder="Enter mail id" max="5" maxlength="50" required="required">
                </td>
            </tr>
           
            <tr>
                <td>username</td>
                <td>
                    <input type="text" name="un" placeholder="Enter your username" maxlength="20" required="required">
                </td>

            <tr>
<tr>
                <td>password</td>
                <td>
                    <input type="password" name="pwd" placeholder="Enter your password" maxlength="20" required="required">
                </td>

            <tr>

                <td>
                    <input type="submit" name="submit">
                </td>
                <td>
                    <input type="reset" name="reset">
                </td>
            </tr>
        </table>

        </form>
    </body>
</html>


<?php
          if(isset($_POST['submit']))
          {

            $q = mysqli_query($db,"SELECT * FROM `registration` where username =  '$_POST[username]';");
            $c = mysqli_fetch_row($q);
            if($c == 0)
            {
              $q = mysqli_query($db,"INSERT into `registration`(name,username,email,password) VALUES('$_POST[name]','$_POST[username]','$_POST[email]','$_POST[password]');");
              if($q)
              {
                ?>
                <script type="text/javascript">
                     window.location = "toplikes.php";
                </script><?php

              }
              else {
                ?>
                <script type="text/javascript">
                  alert("Registration Failed");
                </script>
                <?php
              }
            }else {
              ?>
              <script type="text/javascript">
                alert("Username is Already taken");
              </script>
              <?php
            }

          }

       ?>