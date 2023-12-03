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
            }
            ?>
            <li><a href="login.php" class="nav" id="Login">Login</a></li>
            <li><a href="signup.php" class="nav" id="SignUp">SignUp</a></li>
            <li><a href="endsession.php" class="nav">LogOut</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <footer>
      <ul>
        <li>Name: Pedro Yazael Mercado Ruano - 4P</li>
        <li>Subjects: DW, BD</li>
      </ul>
    </footer>
  </body>
</html>
<?php
include "config.php";

$log = mysqli_query($conn, "SELECT id, fecha, sentencia, contrasentencia FROM bitacora_prod");

if ($log->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>id</th>
                <th>fecha: </th>
                <th>sentencia</th>
                <th>contrasentencia</th>
            </tr>";

    while($row = $log->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["fecha"] . "</td>
                <td>" . $row["sentencia"] . "</td>
                <td>" . $row["contrasentencia"] . "</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "Sin datos en la bitacora";
}
?>
    
</body>
</html>