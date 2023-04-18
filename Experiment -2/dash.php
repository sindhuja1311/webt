<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="sandy";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
$result='';


if(isset($_POST["LOGIN"])){  
    $uname=$_POST['uname'];
    $passw=$_POST['pass'];
    

    if(!$conn)
    {
        die("Connection Failed:" . mysqli_connect_error());
    }
    else{
        $sql="select * from signup WHERE uname='".$uname."' and pass='".$passw."'";
        $result=mysqli_query($conn,$sql);
    }
    if (mysqli_num_rows($result) > 0) {
        session_start();
$_SESSION['uname']=$uname;
header('location:dashboard.php');
}
 else {  
       header("location: login.php");  
      }
    
    }

?>