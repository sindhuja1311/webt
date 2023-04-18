<?php
$servername="localhost";
$username="root";
$password="";
$database_name="sandy";
$conn=mysqli_connect($servername,$username,$password,$database_name);
if(!$conn){
    die("Connection failed:". mysqli_connect_error());
}
if(isset($_POST['submitt']))
{
    $fn=$_POST['fulln']; 
    $eid=$_POST['eid'];
    $dob=$_POST['dob'];
    $gender=$_POST['gen'];
    $phno=$_POST['phno'];
    $uname=$_POST['uname'];
    $password=$_POST['pass'];
    
    $sql="INSERT INTO signup(fn,eid,dob,gen,phno,uname,pass)
    VALUES('$fn','$eid','$dob','$gender','$phno','$uname','$password')";

    if(mysqli_query($conn,$sql)){
        header('location:login.php');
    }
    else{
        echo "Error:". $sql ."". mysqli_error($conn);
    }
    mysqli_close($conn);

}
?>