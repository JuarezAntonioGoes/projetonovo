<!DOCTYPE html>
<html lang="pt-br">
   <head>
<meta charset="UTF-8">
<title></title>
   </head>
   <body>
<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
$nome = $_POST['nome'];
$email_cliente = $_POST['email'];
$mensagem = $_POST['mensagem'];
 
// Comment out the above line if not using Composer
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("xxxx@xxxx.xxxx", "Example User");
$email->setSubject("ENVIO ATRAVÉS DO SITE");
$email->addTo("xxxx@xxxx.xxxx", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent
   ("text/html", "Olá, <br><br>Nova mensagem de contato<br>
   <br>Nome: $nome <br>Email: $email_cliente <br>Mensagem: $mensagem");

$apiKey = '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';
$sg = new \SendGrid($apiKey);

try {
    $response = $sg->send($email);
    echo "<script language='javascript'> window.location = 'index.php'</script>";

} catch (Exception $e) {
    echo 'Caught exception: '.  $e->getMessage(). "\n";
}