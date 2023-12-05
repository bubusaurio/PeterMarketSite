<?php
  session_start();
  $username = $_SESSION['username'];
  $email = $_SESSION['email'];
  if(!($username=="")){
    echo "Welcome, $username, $email"; 
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peter Market WebSite</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav.css">
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
    </header>

    <div class="Head" id="Mission">
      <h2>Mission</h2>
      <span class="hoverme">Hover me!</span>
      <div class="Invisible">
        <img src=".\src\lazy.png" class="mission-img" width="400" height="400">
        <p class="home-text" id="mission-text">Nuestra mision es hacer que desde la comodidad de tu casa te llegue tus productos favoritos de tu supermercado favorito.</p>
      </div>
    </div>

    <div class="Head" id="Vision">
      <h2>Vision</h2>
      <span class="hoverme">Hover me too!</span>
      <div class="Invisible">
        <img src=".\src\market.png" class="vision-img" width="400" height="400">
        <p class="home-text" id="vision-text">Queremos que todos nuestros clientes tengan su despensa sin los imprevistos, esfuerzo o gasto que requieren para la adquision de la despensa.</p>
      </div>
    </div>

    <div class="Head" id="AboutUs"> 
      <h2>About Us</h2>
      <span class="hoverme">Last hover here!</span>
      <div class="Invisible">
        <img src=".\src\about.png" class="ab-img" width="300" height="300">
        <p class="home-text" id="ab-text">En esta pagina podras hacer tus pedidos de despensa de tus supermercados favoritos y te los llevaran a tu casa.</p>
        <button class="button-74" onclick="window.location.href = 'products.html';">Productos</button>
      </div>
    </div>

    <br/>
    <br/>
    <!-- <div class="Head" id="location"> 
      <h2>Location</h2>
        <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3732.1978482754894!2d-103.39144958884131!3d20.70218899883457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae4e98d5453d%3A0xc4fdd3929a2ecbd1!2sCentro%20de%20Ense%C3%B1anza%20T%C3%A9cnica%20Industrial%20(Plantel%20Colomos)!5e0!3m2!1sen!2smx!4v1694648615423!5m2!1sen!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div> -->

    <footer>
      <ul>
        <li>Name: Pedro Yazael Mercado Ruano - 4P</li>
        <li>Subjects: DW, BD</li>
      </ul>
    </footer>
  </body>
</html>

