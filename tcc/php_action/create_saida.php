<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function segundos($segundos)
{
	$horas = floor($segundos / 3600);
	$minutos = floor($segundos % 3600 / 60);
	return sprintf("%d:%02d", $horas, $minutos);
}

if (isset($_POST['btn-saida'])) :

	$placa = mysqli_escape_string($connect, $_POST['placa']);
	$entrada = mysqli_escape_string($connect, $_POST['entrada']);
	$placa = strtoupper($placa);
	$data_entrada = mysqli_escape_string($connect, $_POST['data_entrada']);

	list($horas, $min) = explode(":", $entrada);
	$calc = $horas * 3600 + $min * 60;


	$data_entrada1 = explode('/', $data_entrada);

	$d1 = strtotime("$data_entrada1[2]-$data_entrada1[1]-$data_entrada1[0]");
	if (isset($_POST['data_saida'])) {
		$data_saida = mysqli_escape_string($connect, $_POST['data_saida']);
		$data_saida1 = explode('/', $data_saida);
		$d2 = strtotime("$data_saida1[2]-$data_saida1[1]-$data_saida1[0]");

		$datafinal = $d2 - $d1;
	}


	if (isset($_POST['saida'])) {
		$saida = mysqli_escape_string($connect, $_POST['saida']);
		list($horass, $minn) = explode(":", $saida);
		$calc1 = $horass * 3600 + $minn * 60;
		$resoma = $calc1 - $calc;
		$resoma = $resoma + +$datafinal;
		$resut_soma = segundos($resoma);

		//novo
		list($hora, $minuto) = explode(":", $resut_soma);
		$preco = $hora * 3600 + $minuto * 60; //em segundos


		$hora = floor($preco / 3600);
		$hora = $hora * 6;

		$minuto = floor($preco % 3600 / 60);
		$zero = 00;

		if ($minuto >= 0 && $minuto < 30) {
			$hora = $hora + 3;
		} elseif ($minuto >= 30) {
			$hora = $hora + 6;
		}
		$preco_final = sprintf("%d,%02d", $hora, $zero);
	} else {
		$resut_soma = "0:00";
	}

	
	$id = mysqli_escape_string($connect, $_POST['id']);



	$sql = "UPDATE clientes SET preco_total = '$preco_final', placa = '$placa', entrada = '$entrada', saida = '$saida', hora_total = '$resut_soma', data_entrada='$data_entrada', data_saida='$data_saida'  WHERE id = '$id'";
    
    if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
		
	endif;
endif;

