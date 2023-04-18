<html>

    <h1 align="center">WELCOME TO FACEBOOK</h1>
    <h3 align="center">if u don't have an account signup otherwise login...</h3>
    <div class="box">
    <form method="post">
    <table align="center">
    <tr>
                  <td><label for="username" style="color:blue">UserName:</label></td>
                  <td><input type="text" name="uname" id="name" placeholder="your username"></td>
    </tr>
    <tr>
                  <td><label for="password" style="color:blue">Password:</label></td>
                  <td><input type="password" name="pd" id="pwd" placeholder="your password"></td>
                </tr>          
    <tr>
<td align="center"><input type="submit" class="submit" value="LOGIN" name="submit" /></td>
</tr>
</table>
</form>
        <center><a href="signup.php"><button>SIGNUP</button></a></center>        
</div>
</html>
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $uname = $_POST["uname"];
        $pwd=$_POST["pd"];
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'mydb';

        $conn = mysqli_connect($host, $username, $password, $dbname);

        if ($conn) {
            echo "";
        }
        else{
            echo "Connection Failed.";
            die("Connection Failed:".mysqli_connect_error());
        }
        $sql = "select * from file where username='$uname' and password='$pwd'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
           $_SESSION['uname']=$uname;
           header('Location:index.php');
        }
        else
{
            echo "<script>alert('invalid login.Please enter correct password and username')</script>";
           //header('Location:login.php');
        }
}
?>


<style>
body{
    /*background-image:url("C:\xampp\htdocs\facebook_app\bg.jpg");
    background-repeat: no-repeat;
    background-size:cover;*/
    font-weight: 2000px;
    font-style: italic;
    background-repeat: no-repeat;
    background-size: cover;
background-color:#def;
}
h1{
    color:red;
    margin-top: 30px;
}
.box{
    padding: 10px;
    margin-left: 35%;
    margin-right: 35%;
    background-color:skyblue;
    border-radius: 10px;
width:400;
height:150;
}
td{
    font-size: 25px;
    font-style: italic;
}
</style>