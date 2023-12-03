<?php

@include 'config.php';

if(isset($_POST['submitInsert'])){
  $name = mysqli_real_escape_string($conn, $_POST['productName']);
  $price = mysqli_real_escape_string($conn, $_POST['productPrice']);
  $des = mysqli_real_escape_string($conn, $_POST['productDescription']);
  $Quantity = mysqli_real_escape_string($conn, $_POST['productQ']);

  $insert = "INSERT INTO products(name, price, description, quantity) VALUES('$name', '$price' ,'$des', '$Quantity')";
  echo "Insert";
  $result = mysqli_query($conn, $insert);
};

if(isset($_POST['submitUpdate'])){
  $name = mysqli_real_escape_string($conn, $_POST['productName']);
  $price = mysqli_real_escape_string($conn, $_POST['productPrice']);
  $des = mysqli_real_escape_string($conn, $_POST['productDescription']);
  $Quantity = mysqli_real_escape_string($conn, $_POST['productQ']);

  $update = " UPDATE products SET price='$price', description='$des', quantity='$Quantity' WHERE name='$name' ";

  if ($conn->query($update) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
  
}

if(isset($_POST['submitDelete'])){
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
    
    <div class="itembase">
      <div class="column">
        <h2 class="category">Available Products</h2>
        <?php
        @include 'config.php';
        
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        $numRows = mysqli_num_rows($result);

        for($i = 0; $i<$numRows; $i++){
          $sql2 = "SELECT * FROM user_form WHERE id = $i";
          $result2 = $conn->query($sql2);
          $userData = $result->fetch_assoc();
          echo "ID: " , $userData['id'];
          echo "<br>";
          echo "Name: " , $userData['name'];
          echo "<br>";
          echo "Username: " , $userData['username'],"$";
          echo "<br>";
          echo "Description: " , $userData['description'];
          echo "<br>";
          echo "Quantity: " , $userData['quantity'];
          echo "<br>";
          echo "<br>";
        }
        ?>
      </div>

      <div class="column">
        <h2 class="category">Add Products</h2>
        <form action="edit_users.php" method="post" id="productForm">
          <label for="productName">Product Name:</label>
          <input type="text" id="productName" name="productName" required>

          <label for="productPrice">Product Price:</label>
          <input type="text" id="productPrice" name="productPrice">

          <label for="productQ">Product Quantity:</label>
          <input type="text" id="productQ" name="productQ">

          <label for="productDescription">Product Description:</label>
          <textarea id="productDescription" name="productDescription" rows="4"></textarea>

          <input type="submit" name="submitInsert" value="Insert Product" class="btn">
          <input type="submit" name="submitUpdate" value="Update Product" class="btn">
          <input type="submit" name="submitDelete" value="Delete Product" class="btn">
          <a  class="btn" href="sendpdf.php">Send PDF</a>
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