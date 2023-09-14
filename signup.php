<?php

@include 'config.php';

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = md5($_POST['pass']);

  $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    $error[] = 'User already exist';
  }else{
    $insert = "INSERT INTO user_form(name, username, email, password) VALUES('$name', '$username' ,'$email', '$pass')";
    mysqli_query($conn , $insert);
    header('location:login.php');
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
    <title>SignUp</title>
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

    <div class="formBase" id="signbase"><p>.</p>
        <h2>SignUp</h2>
        <form action=" " method="post">
          <?php
          if(isset($error)){
            foreach($error as $error){
              echo '<span class = "error-msg>'.$error.'</span>';
            };
          };
          ?>
          <ul class="loginform">
              <input name="name" type="text" placeholder="Name">
              <input name="username" type="text" placeholder="Username">
              <input name="email" type="email" placeholder="Email">
              <input name="pass" type="password" placeholder="Password">
              <input type="submit" name="submit" value="Signup" class="formbutton">
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