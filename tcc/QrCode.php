<?php
include 'php_action/db_connect.php';

$id= $_GET['id'];

require_once("phpqrcode/qrlib.php");


$path = 'images_qr/';
$file = $path . $id . '.png';

$url = 'www.google.com';

QRcode::png($url, $file, 'L', 10, 2);

header('Location: ./pdf?id='.$id);
?>