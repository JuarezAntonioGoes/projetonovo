<?php

// Conexão
require_once '../php_action/db_connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM adicionar_servico WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);

$dados = mysqli_fetch_array($resultado);

require_once __DIR__ . '/vendor/autoload.php';

$html = '
<h1 style="text-align: center;">ENTRADA DO PRODUTO: </h1>
<br><br>

<p style"text-align: justified;">NOME: ' . $dados['nome'] . '</p>
<br>
<p>CPF/CNPJ:  ' . $dados['cpf'] . '</p>
<h1 style="text-align: center;"><img style="text-align: center;" src="../images_qr/'.$id.'.png"  alt="" ></h1>

';
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
