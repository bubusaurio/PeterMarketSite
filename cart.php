<?php
session_start();
function calculateTotalPrice() {
    $total_price = 0;

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        if (isset($_SESSION['cart'][$username]) && !empty($_SESSION['cart'][$username])) {
            foreach ($_SESSION['cart'][$username] as $id => $product_info) {
                $subtotal = $product_info['quantity'] * $product_info['price'];

                $total_price += $subtotal;
            }
        }
    }

    return $total_price;
}

if (isset($_GET['remove_identifier'])) {
    $productIdentifier = $_GET['remove_identifier'];
    removeFromCart($productIdentifier);
}

function removeFromCart($productIdentifier) {
    $username = $_SESSION['username'];
    unset($_SESSION['cart'][$username][$productIdentifier]);
}
?>

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
    $error[] = 'User already exist';
  }else{
    $insertUser = "INSERT INTO user_form(name, username, email, password) VALUES('$name', '$username' ,'$email', '$pass')";
    $insertAddress = " INSERT INTO address(name, street, extnumber, intnumber, postalcode) VALUES ('$name', '$street', '$extNumber', '$intNumber', '$pc') ";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: burlywood;
        }

        .total {
            font-weight: bold;
        }
    </style>
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

    <h2>Your Shopping Cart</h2>
    <br>

    <?php
    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        if (isset($_SESSION['cart'][$username]) && !empty($_SESSION['cart'][$username])) {
            ?>
            <table>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
                <?php
                foreach ($_SESSION['cart'][$username] as $product_id => $product_info) {
                    $subtotal = $product_info['quantity'] * $product_info['price'];
                    ?>
                    <tr>
                        <td><?= $product_info['name']; ?></td>
                        <td><?= $product_info['quantity']; ?></td>
                        <td>$<?= number_format($product_info['price'], 2); ?></td>
                        <td>$<?= number_format($subtotal, 2); ?></td>
                        <td><a href="cart.php?remove_identifier=<?php echo $product_id?>">Remove</a></td>
                    </tr>
                    <?php
                }
                ?>
                <tr class="total">
                    <td colspan="3">Total</td>
                    <td>$<?= number_format(calculateTotalPrice(), 2); ?></td>
                </tr>
            </table>
            <p><a class="button-74" id="checkout-btn" href="checkout.php">Proceed to Checkout</a></p>
            <?php
        } else {
            echo "<p>Your cart is empty.</p>";
        }
    } else {
        echo "<p>Please log in to view your cart.</p>";
    }
    ?>
    <footer>
      <ul>
        <li>Name: Pedro Yazael Mercado Ruano - 4P</li>
        <li>Subjects: DW, BD</li>
      </ul>
    </footer>

</body>
</html>