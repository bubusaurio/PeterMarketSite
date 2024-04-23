<?php

@include 'config.php';

if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);

  $select = " SELECT username, password FROM user_form WHERE username = '$username' && password = '$pass' ";

  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0){
    echo 'Logged In';
  }else{
    echo 'User or Password incorrect';
  }

  $sql = "SELECT * FROM user_form WHERE username = '$username'";
  $resultQuery = $conn ->query($sql);

  if($resultQuery->num_rows>0){
    $userData = $resultQuery->fetch_assoc();
    session_start();
    $_SESSION['user_type'] = $userData['user_type'];
    $_SESSION['name'] = $userData['name'];
    $_SESSION['username'] = $userData['username'];
    $_SESSION['email'] = $userData['email'];

    $sql2 = " SELECT * FROM addresses WHERE username = '$username'";
    $resultQuery2 = $conn->query($sql2);
    if($resultQuery2->num_rows>0){
      $userAddress = $resultQuery2->fetch_assoc();
      $_SESSION['street'] = $userAddress['street'];
      $_SESSION['extnumber'] = $userAddress['extnumber'];
      $_SESSION['intnumber'] = $userAddress['intnumber'];
      $_SESSION['postalcode'] = $userAddress['postalcode'];
    }

    header('location:index.php');
  }else{
    echo "User not Found";
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
    <title>Login</title>
</head>
<body>
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
      </div>
    </header>

    <div class="formBase" id="logbase"><p>.</p>
        <h2>Login</h2>
        <form action="login.php" method="post">
            <ul class="loginform">
                <input name="username" type="text" placeholder="Username">
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