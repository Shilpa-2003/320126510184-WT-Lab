<?php
$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
if(!$conn)
{
die("connection failed:"mysqli_connect_error());}
if($_server["request_method"]=='POST')
{
    $name=$yea=$gender=$mobile_no=" ";}
if (empty($_post['name']))
{die("name is required");}
else{
    $name=test_input($_POST ['name']);
    if(!preg_match("/^[a-z A-Z]$/",$name))
    {die("name should not contain number");}
}
if(empty($_post['year']))
{die("year is required");}
else
{
    $year=test_input($_post['year']);
if(!preg_match("/^[1-4]$/",$year))
{
    die("year must between 1 and 4")
}
}
if(empty($_post["mobile_no"]))
{die("reg_no is required");}
else{
    $reg_no=test_input($_post["mobil_no"]);
    if(!is_numeric($reg_no))
    {
        die("mobile_no must be a number");
    }
}
if(empty($_post['gender']))
{die("gender is required");}
else
{
    $year=test_input($_post['gender']);
if(!preg_match("/^[a-z A-Z]$/",$gender))
{
    die("gender should not contain number")
}
}
$sql="insert into register(name,year,mobile_no,gender) values ('$name','$year','$mobile_no','$gender');
if(mysqli_query($conn,$sql)){
    echo" form subbmitted successfully"
}
else{
    echo"error".$sql."<br>".mysqli_error($conn);
}
mysqli_close($conn);
}
function test_input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchar($data);
    return $data;
}
?>