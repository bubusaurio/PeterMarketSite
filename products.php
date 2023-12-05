<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peter Market WebSite</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="showproducts.css">
  </head>
  <body>
    <?php
    session_start();
    echo $_SESSION['errorQ'];
    $_SESSION['errorQ'] = '';
    ?>
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

    <div class="container">
    <?php
    @include 'config.php';

    $sql = "SELECT id, name, price, description, quantity, image FROM products";
    $result = $conn->query($sql);

    // Display products from the database
    if ($result->num_rows > 0) {
        while ($product = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<form method="post" action="shopping_cart.php">';
            echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '" width="30px" height="200px">';
            echo '<h2>' . $product['name'] . '</h2>';
            echo '<p>' . $product['description'] . '</p>';
            echo '<p>Price: $' . number_format($product['price'], 2) . '</p>';
            echo '<p>Quantity: ' . $product['quantity'] . '</p>';
            echo '<input type="hidden" name="productId" value="'.$product['id'].'">';
            echo '<input type="hidden" name="productName" value="'.$product['name'].'">';
            echo '<input type="hidden" name="productPrice" value="'.$product['price'].'">';
            echo '<input type="hidden" name="productQuantity" value="'.$product['quantity'].'">';
            echo '<input type="hidden" name="productImage" value="'.$product['image'].'">';
            echo '<input type="submit" class="add-to-cart" value="Add to Cart" name="addToCart">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>No products found.</p>';
    }
    ?>
</div>
  </body>
</html>