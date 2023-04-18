<?php
session_start();
$vis = true;
if(isset($_SESSION['LOGIN']))
{
    $vis = false;
}

?>
<?php
if(isset($_POST["submit"]))
{
$con=new mysqli("localhost","root","","sandy");
$f=$_FILES["image"]["name"];
$des=$_POST["desc"];
$n=$_SESSION["uname"];
$allowed_types = array('jpg', 'jpeg', 'png', 'gif');
$file_ext = strtolower(pathinfo($f, PATHINFO_EXTENSION));
if (!in_array($file_ext, $allowed_types)) {
  echo "<script>alert('Only JPG, JPEG, PNG, and GIF files are allowed.')</script>;";
  echo '<script> window.location.replace("imageupload.php");</script>';
  exit();
}
$u=$con->query("INSERT INTO `images`( `filename`, `description`,`uname`) VALUES ('$f','$des','$n')");
$target_dir = "UPLOADS/";
$file_tmp_name = $_FILES['image']['tmp_name'];
$target_file = $target_dir.basename($f);
move_uploaded_file($file_tmp_name, $target_file);

if(isset($u))
{
  echo"<script>alert('sucessfully uploaded!!!...');</script>";
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
header('location:dashboard.php #pic-upload');
}
?>
