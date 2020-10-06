
<!DOCTYPE html>
<html lang="pt-br">
   <head>
<meta charset="UTF-8">
<title></title>
   </head>
   <body>
<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

require 'vendor/autoload.php';

$from = new SendGrid\Email(null, "thaynaraswc@gmail.com");
$subject = "Mensagem de contato";
$to = new SendGrid\Email(null, "thaynaraswc@gmail.com");
$content = new SendGrid\Content("text/html", "Olá, <br><br>Nova mensagem de contato<br>
<br>Nome: $nome<br>Email: $email <br>Mensagem: $mensagem");

$mail = new SendGrid\Mail\Mail($from, $subject, $to, $content);

//Necessário inserir a chave
$apiKey = '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';
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo "<script language='javascript'> window.location = 'index.php'</script>"
?>
   </body>
</html>