<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Market Storage</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: burlywood;
    }

    header {
	  background-color: #9f6b00;
      color: #fff;
      text-align: center;
      padding: 1em 0;
    }

    header h1 {
      margin: 0;
    }

    header p {
      font-size: 1.2em;
      margin: 5px 0 0;
    }


    h2 {
      color: #333;
    }

    footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 1em 0;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>
</head>
<body>
  <header>
    <h1>PeterMarket</h1>
    <p>The Best Market</p>
  </header>
  <?php
  	session_start();
  	$email = $_SESSION['email'];
  	$username = $_SESSION['username'];
    @include 'config.php';
        
	  $sql = "SELECT * FROM products";
	  $result = $conn->query($sql);
  
	  $numRows = mysqli_num_rows($result);
	  $body = $body . '<br>'.'Enviado al usuario: '.$username.' con el correo asociado: '.$email.'.'.'<br>'.'<br>'.'Available Products in the Store: '.'<br>'.'<br>';
	  for($i = 0; $i<$numRows; $i++){
		  $sql2 = "SELECT * FROM products WHERE id = $i";
		  $result2 = $conn->query($sql2);
		  $userData = $result->fetch_assoc();
		  $body = $body . 'ID: '.$userData['id'].'<br>';
		  $body = $body . 'Name: '.$userData['name'].'<br>';
		  $body = $body . 'Price: '.$userData['price'].'<br>';
		  $body = $body . 'Description: '.$userData['description'].'<br>';
		  $body = $body . 'Quantity: '.$userData['quantity'].'<br>'.'<br>';
	  }
	  echo $body;
  ?>
</body>
</html>
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
	$mail->Subject = 'PDF Prueba';

    @include 'config.php';
        
	$dompdf->loadHtml($body);
	$dompdf->render();
	$content = $dompdf->output();
	$file_name = 'PeterMarket.pdf';
	file_put_contents($file_name, $content);

	//$dompdf->stream("PeterMarket.pdf", array("Attachment"=>false));

	if (file_exists($file_name) && is_readable($file_name)) {
		$mail->addAttachment($file_name, 'PeterMarket.pdf');
	} else {
		echo 'File not found or not readable.';
	}

	$mail->Body = "Inventario Disponible";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->addAttachment($file_name, 'PeterMarket.pdf', 'base64', 'application/pdf');
	$mail->SMTPDebug = SMTP::DEBUG_OFF;
	$mail->send();
	echo "Mail has been sent successfully!";
    header('location:edit_products.php');
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
