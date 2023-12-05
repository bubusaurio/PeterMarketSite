<?php

@include 'config.php';

if (isset($_POST['submitInsert'])) {
    $name = mysqli_real_escape_string($conn, $_POST['deliveryName']);
    $status  = mysqli_real_escape_string($conn, $_POST['deliveryStatus']);

    $insert = "INSERT INTO delivery(name, status) VALUES('$name', '$status')";
    echo "Inserted";
    $result = mysqli_query($conn, $insert);
}
;

if (isset($_POST['submitUpdate'])) {
    $name = mysqli_real_escape_string($conn, $_POST['deliveryName']);
    $status  = mysqli_real_escape_string($conn, $_POST['deliveryStatus']);

    $update = " UPDATE delivery SET status='$status' WHERE name='$name' ";
    $result = mysqli_query($conn, $update);

}

if (isset($_POST['submitDelete'])) {
    $name = mysqli_real_escape_string($conn, $_POST['deliveryName']);

    $delete = "DELETE FROM delivery WHERE name='$name'";
    $result = mysqli_query($conn, $delete);

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
            <h2 class="category">Delivery</h2>
            <?php
            include "config.php";

            $log = mysqli_query($conn, "SELECT id, name, status FROM delivery");

            if ($log->num_rows > 0) {
                echo "<table border='1'>
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Status:</th>
            </tr>";

                while ($row = $log->fetch_assoc()) {
                    echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["status"] . "</td>
              </tr>";
                }

                echo "</table>";
            } else {
                echo "Sin datos en delivery";
            }
            ?>
        </div>

        <div class="column">
            <h2 class="category">Edit Delivery</h2>
            <form action="delivery.php" method="post" id="productForm">
                <label for="deliveryName">Name:</label>
                <input type="text" id="deliveryName" name="deliveryName" required>

                <label for="deliveryStatus">Status:</label>
                <input type="text" id="deliveryStatus" name="deliveryStatus">

                <input type="submit" name="submitInsert" value="Insert Delivery" class="btn">
                <input type="submit" name="submitUpdate" value="Update Delivery" class="btn">
                <input type="submit" name="submitDelete" value="Delete Delivery" class="btn">
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