<?php

@include 'config.php';

if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = md5($_POST['pass']);

  $select = " SELECT username, password FROM user_form WHERE username = '$username' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    echo 'Logged In';
    header('location:index.html');
  }else{
    echo 'User or Password incorrect';
  }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <script src="js/app.js"></script>
    <header>
      <div>
        <p class="logoName">Peter Market</p>
        <nav>
          <ul>
            <li><a href="index.html" class="nav" id="Home">Home</a></li>
            <li><a href="products.html" class="nav" id="Products">Products</a></li>
            <li><a href="login.php" class="nav" id="Login">Login</a></li>
            <li><a href="signup.php" class="nav" id="SignUp">SignUp</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="formBase" id="logbase"><p>.</p>
        <h2>Login</h2>
        <form action="login.php" method="post">
            <ul class="loginform">
                <input  name="username" type="text" placeholder="Username">
                <input name="pass" type="password" placeholder="Password">
                <input type="submit" name="submit" value="Login" class="formbutton">
            </ul>
  
        </form>
    </div>

    <footer>
      <ul>
        <li>Name: Pedro Yazael Mercado Ruano - 4P</li>
        <li>Subjects: DW, BD</li>
      </ul>
    </footer>
</body>
</html>