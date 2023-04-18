<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook login</title>
    <link rel="stylesheet" href="loginpage.css">
</head>
<body>
    <!--navbar-->
    <div id="navbar">
        <ul>
            <li><a href="about.asp">About</a></li>
            <li><a href="#container">Login</a></li>
            <li><a href="#container1">Signup</a></li>
            <li><a href="#footer">Contact</a></li>
        </ul>
        <br><br>
        <div class="centered"><H1>PinkCloud</H1>
            <br>
        <P>SHARE LIKE CREATE</P></div>  
    </div>
  <div id="main-con">
    <!--login part-->
    <div id="container">
        <h1>PinkCloud</h1>
        <div id="login-container">
        <form action="dash.php" method='post'>
            <input type="text" placeholder="Username" name="uname">
            <br><br><br>
            <input type="password" placeholder="Password" name="pass">
            <br><br>
            <input type="submit" name="LOGIN" class="login-butt">
            <p>don't have an account?</p><a href="#container1" class="signup-butt" name="signupbutt">signup</a>
        </form>
        
    </div>
    </div>
    <br><br><br>
    <!--sign up part-->
    <div id="container1">
        <h1>SIGN UP</h1>
        <form  action="signup.php" method='POST'>
            <p>Whats your full name?</p>
            <input type="text" placeholder="Fullname" name="fulln">
            <p>Email id?</p>
            <input type="email" placeholder="email" name="eid">
            <p>Date of birth?</p>
            <input type="date" placeholder="DD/MM/YYYY" name="dob">
            <p>Gender?</p>
            <input type="radio" name="gen">MALE
            <input type="radio" name="gen">FEMALE
            <input type="radio" name="gen">PREFER NOT TO SAY
            <p>Phone number</p>
            <input type="number" name="phno">
            <p>Username</p>
            <input type="text" placeholder="username" name="uname" required>
            <p>Password</p>
            <input type="text" placeholder="password" name="pass" required>
            <br><br>
            <input type="submit" class="signup1-butt" name="submitt">
        </form>
    </div>
</div>
    <!--footer -->
    <div class="footie" id="footer">
        <h3>for more</h3>
       <a class=" footer-link" href ="#">Instagram</a>
          <a class="footer-link" href="#">Twitter</a>
          <a class="footer-link" href="#">Facebook</a>
          <a class="footer-link" href="#">Youtube</a>
        </div>
</body>
</html>