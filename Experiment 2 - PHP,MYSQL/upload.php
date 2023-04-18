<?php
session_start();
if(isset($_POST['upload'])){
$i=1;
$e=$_SESSION['username'];
while(true){
    if(file_exists("uploads/$e$i.jpg")){
        $i++;
    }
    else{
        $targ="uploads/$e$i.jpg";
        if(move_uploaded_file($_FILES['myfile']['tmp_name'],$targ)){
            $conn=mysqli_connect("localhost","root","","mydb");
            $q="insert into post values('$e$i.jpg','$e')";
            $conn->query($q);
            if($conn)
             echo "<center><h1 style='background-color:blue;color:white;' >uploaded successfully</h1></center>";
        }

        break;
    }
}
}
?>