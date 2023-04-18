
<?php
 $con = mysqli_connect("localhost","root","","sandy");
 if(isset($_POST['LOGIN'])){
 $uname=$_POST['uname'];
 $pass=$_POST['pass'];}
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashing.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <style>
      
    .form{
        margin: 0 auto;
        width:250px;

    }
    .classie,.feedie{
        width: 500px;
        height: 600px;
        padding: 50px;
        margin-left:auto;
        margin-right:auto;
        border: 5px solid white;
        border-radius:70px;
        box-sizing: border-box;
  
}
.feed{
    width: 500px;
        height: auto;
        padding: 50px;
        margin-left:auto;
        margin-right:auto;
        border: 5px solid white;
        border-radius:70px;
        box-sizing: border-box;
}
h5{
    color:#FFFFF2;
            font-family:sans-serif;
            font-size:25px;
            text-align:center;
            text-decoration:underline;
       }
    .desc{
        font-size:20px;
        font-family:sans-serif;
        text-align:center;
       }
       .center {
         display: block;
         margin-left: auto;
         margin-right: auto;
         width: 50%;
         height:300px;
         width:300px;
    }
    .btn{
        display:block;
         margin-left: auto;
         margin-right: auto;
         height:30px;
         width:50px;
         border-radius:30px;
    }
    .btn:hover{
        background-color:red;
        color:white;

    }
    .btn1{
        display:block;
        margin-left: auto;
         margin-right: auto;
         height:30px;
         border-radius:30px;
         width:100px;}
    .btn1:hover{
        background-color:pink;
        color:white;

    }
    .btn2{
        display:block;
        margin-left: auto;
         margin-right: auto;
         height:30px;
         border-radius:10px;
         width:150px;
    }
    body{

        background-color:#e989a2;
        background-image: url('');
        color:#fffff2;
    }
    </style>
    <!---->
    <title>homepage</title>
</head>
<body>

    <div id='top-nav' >
    <ul>
            <li><a href="#toplikes">TOP LIKES</a></li>
            <li><a href="#posts">POSTS</a></li>
            <li><a href="#myposts">MY POSTS</a></li>
            <li><a href="#pic-upload">UPLOAD</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
        </ul>
    </div>
    <h1 align="center"><?php echo $_SESSION['uname'] ,' page'?></h1>

    <!--top 3-->
    <div id='toplikes'>
        <h1 align="center">TOP LIKES</h1>
        <div>
        <?php
     
     $con=new mysqli("localhost","root","","sandy");
            $query="SELECT * FROM `images` ORDER BY likes DESC LIMIT 3;";
            $r=$con->query($query);
            while($row= mysqli_fetch_assoc($r))
            {
                $u=$row["uname"];
                $t=$row["filename"];
                $s="UPLOADS/" . $t; 
                $d=$row["description"];
                $imgid=$row["id"];   
                $likes=$row["likes"];
            echo'
                <div class="container">
                <div class="classie">
                <h5>'.$u.'</h5>
                <div class="photo">
                <img src="'.$s.'"alt="" class="center"></div>
                <p class="desc">'.$d.'</p>
                </div>
                </div> <br><br>';
            }
        ?>
    </div>
        </div>

    <!--feed-->
    <div id="posts">
        <h1 align="center">FEED</h1>
        <div>
<?php
     
     $con=new mysqli("localhost","root","","sandy");
            $query="SELECT  `id`,`filename`, `description`, `uname`, `likes` FROM `images`";
            $r=$con->query($query);
            while($row= mysqli_fetch_assoc($r))
            {
                $u=$row["uname"];
                $t=$row["filename"];
                $s="UPLOADS/" . $t;   
                $d=$row["description"];
                $imgid=$row["id"];   
                $likes=$row["likes"];
            echo'
                <div class="container">
                <div class="feed" >
                <h5>'.$u.'</h5>
                <div class="photo">
                <img src="'.$s.'"alt="" class="center"></div>
                <p class="desc">'.$d.'</p>
                <form action="like.php" method="POST">
                <input type="hidden" name="image_id" value="' . $imgid . '" />
                <button class="btn" name="submit" type="submit" ><i class="uil uil-heart" ></i>'.$likes.'</button>
                </form>
                <form action="dashboard.php" method="POST" align="center" class="form">
                <table>
                <tr>
                <td><input name="comm" type="text" placeholder="comment"  class="btn2"></td>
                <td><input type="hidden" name="image_id" value="' . $imgid . '" /></td>
                <td><button name="submit" type="submit" class="btn1">Send</button></td>
                </tr>
                </table>';
                $q="SELECT `id`, `img_id`, `username`, `comment`, `timesatmp` FROM `comments` WHERE `img_id`='$imgid'";
                $c=$con->query($q);
                if(isset($c))
                {
                    while($com=mysqli_fetch_assoc($c))
                    {
                        $commenter=$com['username'];
                        $des=$com['comment'];
                        echo'<p class="desc"><b>'.$commenter.'</b></p>';
                        echo'<p class="desc">'.$des.'</p>
                        ';
                    }
                }
                echo'</form>
                    </div>
                </div> <br> <br>';
            }  
            if(isset($_POST["submit"]))
            {
                $i=$_POST['image_id'];
                $c=$_POST['comm'];
                $u=$_SESSION["uname"];
                $con= new mysqli("localhost","root","","sandy");
                $query="INSERT INTO `comments`(`img_id`, `username`, `comment`) VALUES ('$i','$u','$c')";
                $r=$con->query($query);
                if(isset($r))
                {
                    echo"<script>alert('commented');</script>";
                }
                echo'<p class="desc">'.$c.'</p>';
            }
        ?>
    </div>
    </div>

    <!--display current user posts-->
    <div id='myposts'>
    <h1 align="center">MY POSTS</h1>
        <div>
        <?php
     
     $con=new mysqli("localhost","root","","sandy");
     $u1=$_SESSION['uname'];
            $query="SELECT  `id`,`filename`, `description`, `uname`, `likes` FROM `images` where `uname`='$u1'";
            $r=$con->query($query);
            while($row= mysqli_fetch_assoc($r))
            {
                $u=$row["uname"];
                $t=$row["filename"];
                $s="UPLOADS/" . $t; 
                $d=$row["description"];
                $imgid=$row["id"];   
                $likes=$row["likes"];
            echo'
                <div class="container">
                <div class="feedie">
                <h5 >'.$u.'</h5>
                <div class="photo">
                <img src="'.$s.'"alt="" class="center"></div>
                <p class="desc">'.$d.'</p>
                <form action="like.php" method="POST">
                <input type="hidden" name="image_id" value="' . $imgid . '" />
                <button class="btn" name="submit" type="submit" ><i class="uil uil-heart" ></i>'.$likes.'</button>
                </form>
                </div></div>
            <br><br>';
            }
            
        ?>
    </div>
    </div>
    

    <!--photo upload-->
    <div id="pic-upload">
        <form  action="imageupload.php" method="POST" enctype="multipart/form-data" class="pic-up"align="center">
        <h1 align="center">UPLOAD</h1>
            <h2>Post?</h2>
            <p style="font-size:30px"><b>CHOOSE YOUR FILE</b></p>
            <input type="file" name="image" class="butt">
            <p>description?</p>
            <input type="text" name="desc" class="butt">
            
            <input type="submit"  class="butt" name="submit" value="POST">
        </form>
        
    </div>
</body>
</html>
