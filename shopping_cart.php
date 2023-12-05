<?php
@include 'config.php';

session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (isset($_POST['addToCart'])) {
        $id = $_POST['productId'];
        $name = $_POST['productName'];
        $price = $_POST['productPrice'];
        $quantity = $_POST['productQuantity'];

        if($quantity <= 0){
            $_SESSION['errorQ']= 'Product Unavailable in the moment';
            header("Location: products.php");
            exit();
        }

        if (!isset($_SESSION['cart'][$username])) {
            $_SESSION['cart'][$username] = [];
        }

        if (isset($_SESSION['cart'][$username][$id])) {
            $_SESSION['cart'][$username][$id]['quantity'] += 1;
        } else {
            $_SESSION['cart'][$username][$id] = [
                'name' => $name,
                'price' => $price,
                'quantity' => 1
            ];
        }

        // Redirect back to the products page or wherever you want
        header("Location: products.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>