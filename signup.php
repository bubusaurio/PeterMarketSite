<?php

@include 'config.php';

if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $street = mysqli_real_escape_string($conn, $_POST['street']);
  $pc = mysqli_real_escape_string($conn, $_POST['postalcode']);
  $extNumber = mysqli_real_escape_string($conn, $_POST['extnumber']);
  $intNumber = mysqli_real_escape_string($conn, $_POST['intnumber']);


  $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    echo 'User already exist';
  }else{
    $insertUser = "INSERT INTO user_form(name, username, email, password) VALUES('$name', '$username' ,'$email', '$pass')";
    $insertAddress = " INSERT INTO addresses(username, street, extnumber, intnumber, postalcode) VALUES ('$username', '$street', '$extNumber', '$intNumber', '$pc') ";
    mysqli_query($conn , $insertUser);
    mysqli_query($conn , $insertAddress);
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
    <link rel="stylesheet" href="nav.css">
    <title>SignUp</title>
</head>
<body>
    <script src="js/app.js"></script>
    <header>
      <div>
        <p class="logoName">Peter Market</p>
        <a class="cart" href="cart.php"><img src="./assets/shopping_cart.png" alt="" srcset="" height="30px" width="50px"></a>
        <nav>
          <ul>
            <li><a href="index.php" class="nav" id="Home">Home</a></li>
            <li><a href="products.php" class="nav" id="Products">Products</a></li>
            <?php
            session_start();
            $user_type = $_SESSION['user_type'];
            if($user_type == "admin"){
              echo '<li><a href="edit_products.php" class="nav">EditProducts</a></li>';
              echo '<li><a href="edit_users.php" class="nav">EditUsers</a></li>';
              echo '<li><a href="log.php" class="nav">DevLog</a></li>';
            }
            ?>
            <li><a href="login.php" class="nav" id="Login">Login</a></li>
            <li><a href="signup.php" class="nav" id="SignUp">SignUp</a></li>
            <li><a href="endsession.php" class="nav">LogOut</a></li>
            <li><a href="delivery.php" class="nav">Delivery</a></li>
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
              <h3>Address Info</h3>
              <input name="street" type="text" placeholder="Street">
              <input name="postalcode" type="text" placeholder="PostalCode">
              <input name="extnumber" type="text" placeholder="Ext.Number">
              <input name="intnumber" type="text" placeholder="Int.Number">
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