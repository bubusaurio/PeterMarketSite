<?php

@include 'config.php';

if (isset($_POST['submitInsert'])) {
  $name = mysqli_real_escape_string($conn, $_POST['productName']);
  $price = mysqli_real_escape_string($conn, $_POST['productPrice']);
  $des = mysqli_real_escape_string($conn, $_POST['productDescription']);
  $Quantity = mysqli_real_escape_string($conn, $_POST['productQ']);
  $img = mysqli_real_escape_string($conn, $_POST['productImage']);

  $targetFile = "./img/" . basename($_FILES["productImage"]["name"]);

  $insert = "INSERT INTO products(name, price, description, quantity, image) VALUES('$name', '$price' ,'$des', '$Quantity', '$targetFile')";
  $result = mysqli_query($conn, $insert);
}
;

if (isset($_POST['submitUpdate'])) {
  $name = mysqli_real_escape_string($conn, $_POST['productName']);
  $price = mysqli_real_escape_string($conn, $_POST['productPrice']);
  $des = mysqli_real_escape_string($conn, $_POST['productDescription']);
  $Quantity = mysqli_real_escape_string($conn, $_POST['productQ']);
  
  $targetFile = "./img/" . basename($_FILES["productImage"]["name"]);

  $update = " UPDATE products SET price='$price', description='$des', quantity='$Quantity', image='$targetFile' WHERE name='$name' ";

  if ($conn->query($update) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }

}

if (isset($_POST['submitDelete'])) {
  $name = mysqli_real_escape_string($conn, $_POST['productName']);

  $delete = "DELETE FROM products WHERE name='$name'";

  if ($conn->query($delete) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="nav.css">
  <link rel="stylesheet" href="products.css">
  <title>SignUp</title>
</head>

<body>
  <header>
    <div>
      <p class="logoName">Peter Market</p>
      <a class="cart" href="cart.php"><img src="./assets/shopping_cart.png" alt="" srcset="" height="30px"
          width="50px"></a>
      <nav>
        <ul>
          <li><a href="index.php" class="nav" id="Home">Home</a></li>
          <li><a href="products.php" class="nav" id="Products">Products</a></li>
          <?php
          session_start();
          $user_type = $_SESSION['user_type'];
          if ($user_type == "admin") {
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

  <div class="itembase">
    <div class="column">
      <h2 class="category">Available Products</h2>
      <?php
      include "config.php";

      $log = mysqli_query($conn, "SELECT id, name, price, description, quantity FROM products");

      if ($log->num_rows > 0) {
        echo "<table border='1'>
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Price:</th>
                <th>Description:</th>
                <th>Quantity:</th>
            </tr>";

        while ($row = $log->fetch_assoc()) {
          echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["price"] . "</td>
                <td>" . $row["description"] . "</td>
                <td>" . $row["quantity"] . "</td>
              </tr>";
        }

        echo "</table>";
      } else {
        echo "Sin datos en productos";
      }
      ?>
    </div>

    <div class="column">
      <h2 class="category">Add Products</h2>
      <form action="edit_products.php" enctype="multipart/form-data" method="post" id="productForm">
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="productPrice">Product Price:</label>
        <input type="text" id="productPrice" name="productPrice">

        <label for="productQ">Product Quantity:</label>
        <input type="text" id="productQ" name="productQ">

        <label for="productDescription">Product Description:</label>
        <textarea id="productDescription" name="productDescription" rows="4"></textarea>

        <label for="productImage">Product Image:</label>
        <input type="file" id="productImage" name="productImage" accept="image/*">

        <input type="submit" name="submitInsert" value="Insert Product" class="btn">
        <input type="submit" name="submitUpdate" value="Update Product" class="btn">
        <input type="submit" name="submitDelete" value="Delete Product" class="btn">
        <a class="btn" href="sendpdf.php">Send PDF</a>
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