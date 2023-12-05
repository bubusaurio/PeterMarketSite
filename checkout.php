<?php
@include 'config.php';

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

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (empty($_SESSION['cart'][$_SESSION['username']])) {
    header("Location: cart.php");
    exit();
}
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            font-family: verdana;
            background-color:antiquewhite;
            height: 100%;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

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

        header{
            color: white;
            background-color: #c08100;
        }
    </style>
</head>

<body>
    <header>
        <h2>Order Confirmation</h2>
        <p>Thank you for your order! <?php echo '<b>'. $_SESSION['name'].'</b>' ?></p>
    </header>
    
    <p>Order Details</p>
    <?php
    echo '<p>Street: '.$_SESSION['street'].'</p>';
    echo '<p>Exterior Number: '.$_SESSION['extnumber'].'</p>';
    echo '<p>Interior Number:  '.$_SESSION['intnumber'].'</p>';
    echo '<p>Postal Code: '.$_SESSION['postalcode'].'</p>';
    ?>
    <br>
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>SubTotal</th>
        </tr>
        <?php
        foreach ($_SESSION['cart'][$_SESSION['username']] as $product_id => $product_info) {
            $subtotal = $product_info['quantity'] * $product_info['price'];
            echo '<tr>';
                echo '<td>'. $product_info['name'] . '</td>';
                echo '<td>'. $product_info['quantity'] . '</td>';
                $updateProduct = $product_info['name'];
                $sqlQ = mysqli_query($conn, "SELECT quantity FROM products WHERE name='$updateProduct'");
                $oldQuantity = $sqlQ->fetch_assoc();
                $newQuantity = $oldQuantity['quantity'] - $product_info['quantity'];
                $update = " UPDATE products SET quantity='$newQuantity' WHERE name='$updateProduct' ";
                $result = mysqli_query($conn, $update);
                echo '<td>'. number_format($product_info['price'], 2) . '</td>';
                echo '<td>'. number_format($subtotal, 2) . '</td>';
            echo '</tr>';
        }
        

        ?>
        <tr class="total">
            <td colspan="3">Total</td>
            <td>$<?= number_format(calculateTotalPrice(), 2); ?></td>
        </tr>
    </table>

<?php

$body = ob_get_clean();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Dompdf\Dompdf;
use Dompdf\Options;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
session_start();
$email = $_SESSION['email'];
$username = $_SESSION['username'];

$dompdf = new Dompdf();
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);
$dompdf = new Dompdf($options);

try {
	$mail->SMTPDebug = 2;									 
	$mail->isSMTP();										 
	$mail->Host	 = 'smtp.gmail.com';				 
	$mail->SMTPAuth = true;							 
	$mail->Username = 'pmercadoruano@gmail.com';				 
	$mail->Password = 'vnrn yaak gais qcmp';					 
	$mail->SMTPSecure = 'tls';							 
	$mail->Port	 = 587; 

	$mail->setFrom('pmercadoruano@gmail.com', 'PeterMarket');		 
	$mail->addAddress($email);
	
	$mail->isHTML(true);								 
	$mail->Subject = 'Order Details';
        
	$dompdf->loadHtml($body);
    $dompdf->setPaper('A4', 'portrait');
	$dompdf->render();
	$content = $dompdf->output();
	$file_name = 'OrderDetails.pdf';
	file_put_contents($file_name, $content);

	//$dompdf->stream("OrderDetails.pdf", array("Attachment"=>false));

	if (file_exists($file_name) && is_readable($file_name)) {
		$mail->addAttachment($file_name, 'OrderDetails.pdf');
	} else {
		echo 'File not found or not readable.';
	}

	$mail->Body = "Order Details";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->addAttachment($file_name, 'OrderDetails.pdf', 'base64', 'application/pdf');
	$mail->SMTPDebug = SMTP::DEBUG_OFF;
	$mail->send();
    unset($_SESSION['cart'][$_SESSION['username']]);
	echo "Mail has been sent successfully!";
    header('location:cart.php');
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

