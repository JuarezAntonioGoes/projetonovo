<?php

// Conexão
require_once '../php_action/db_connect.php';




$id = $_GET['id'];

$sql = "SELECT * FROM adicionar_servico WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);

$dados = mysqli_fetch_array($resultado);




//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html('
			<h1 style="text-align: center;">ENTRADA DO PRODUTO: </h1>
			<br><br>
	
			<p style"text-align: justified;">NOME: ' . $dados['nome'] . '</p>
			<br>
			<p>CPF/CNPJ:  ' . $dados['cpf'] . '</p>
			<h1 style="text-align: center;"><img style="text-align: center;" src="../images_qr/'.$id.'.png"  alt="" ></h1>
			
		');

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
	"relatorio.pdf",
	array(
		"Attachment" => false //Para realizar o download somente alterar para true
	)
);
