<?php

@include 'config.php';

if (isset($_POST['submitInsert'])) {
    $name = mysqli_real_escape_string($conn, $_POST['userName']);
    $username  = mysqli_real_escape_string($conn, $_POST['userUserName']);
    $type = mysqli_real_escape_string($conn, $_POST['userType']);
    $pass = mysqli_real_escape_string($conn, $_POST['userPass']);
    $email = mysqli_real_escape_string($conn, $_POST['userEmail']);

    $insert = "INSERT INTO user_form(name, username, email, password, user_type) VALUES('$name', '$username' ,'$email', '$pass', '$type')";
    echo "Inserted";
    $result = mysqli_query($conn, $insert);
}
;

if (isset($_POST['submitUpdate'])) {
    $name = mysqli_real_escape_string($conn, $_POST['userName']);
    $username  = mysqli_real_escape_string($conn, $_POST['userUserName']);
    $type = mysqli_real_escape_string($conn, $_POST['userType']);
    $pass = mysqli_real_escape_string($conn, $_POST['userPass']);
    $email = mysqli_real_escape_string($conn, $_POST['userEmail']);

    $update = " UPDATE user_form SET username='$username', email='$email', password='$pass', user_type='$type' WHERE name='$name' ";

    if ($conn->query($update) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

}

if (isset($_POST['submitDelete'])) {
    $name = mysqli_real_escape_string($conn, $_POST['userName']);

    $delete = "DELETE FROM user_form WHERE name='$name'";

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
            <h2 class="category">Users</h2>
            <?php
            include "config.php";

            $log = mysqli_query($conn, "SELECT id, name, username, email, password, user_type FROM user_form");

            if ($log->num_rows > 0) {
                echo "<table border='1'>
            <tr>
                <th>ID:</th>
                <th>Name:</th>
                <th>Username:</th>
                <th>Email:</th>
                <th>Password:</th>
                <th>User Type:</th>
            </tr>";

                while ($row = $log->fetch_assoc()) {
                    echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["username"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["password"] . "</td>
                <td>" . $row["user_type"] . "</td>
              </tr>";
                }

                echo "</table>";
            } else {
                echo "Sin datos en users";
            }
            ?>
        </div>

        <div class="column">
            <h2 class="category">Edit Users</h2>
            <form action="edit_users.php" method="post" id="productForm">
                <label for="userName">Name:</label>
                <input type="text" id="userName" name="userName" required>

                <label for="userUserName">Username:</label>
                <input type="text" id="userUserName" name="userUserName">

                <label for="userEmail">Email:</label>
                <input type="text" id="userEmail" name="userEmail">

                <label for="userPass">Password:</label>
                <input type="text" id="userPass" name="userPass">

                <label for="userType">User Type:</label>
                <input type="text" id="userType" name="userType">

                <input type="submit" name="submitInsert" value="Insert User" class="btn">
                <input type="submit" name="submitUpdate" value="Update User" class="btn">
                <input type="submit" name="submitDelete" value="Delete User" class="btn">
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