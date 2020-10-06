<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

function segundos($segundos){
	$horas = floor($segundos / 3600);
	$minutos = floor($segundos % 3600 / 60);
	return sprintf("%d:%02d", $horas, $minutos);
}




if(isset($_POST['btn-cadastrar'])):
	
	$placa = clear($_POST['placa']);
	$entrada = clear($_POST['entrada']);
	$data_entrada = $_POST['data_entrada'];
	$data_saida = $_POST['data_saida'];
	$dataa = $data_entrada;

	$placa = strtoupper($placa);

	//data e hora lançado
	date_default_timezone_set('America/Sao_Paulo');
	$data_hora=date('d/m/Y H:i:s');
	

	if($data_entrada != NULL){
	list($horas,$min) = explode(":",$entrada);
	$calc = $horas * 3600 + $min * 60;
	$data_entrada1 = explode('/', $data_entrada);
	$d1 = strtotime("$data_entrada1[2]-$data_entrada1[1]-$data_entrada1[0]");
	}


	
	if($data_saida != NULL && $dataa != NULL){
		
		$data_saida1 = explode('/', $data_saida);
		$d2 = strtotime("$data_saida1[2]-$data_saida1[1]-$data_saida1[0]");
		
		$datafinal= $d2 - $d1;
		
	}
	

	if(isset($_POST['saida'])){
		$saida = clear($_POST['saida']);
		list($horass,$minn) = explode(":",$saida);
		$calc1 = $horass * 3600 + $minn * 60;
		$resoma = $calc1 - $calc;

		if($data_saida != NULL && $dataa != NULL){
			$resoma = $resoma + $datafinal;
			
		}
		$resut_soma = segundos($resoma);

		//novo
		list($hora,$minuto) = explode(":",$resut_soma);
		$preco = $hora * 3600 + $minuto * 60; //em segundos


			$hora = floor($preco / 3600);
			$hora = $hora*6;

			$minuto = floor($preco % 3600 / 60);
			$zero = 00;

			if($minuto>=0 && $minuto<30){
				$hora = $hora + 3;

			}elseif($minuto>=30){
				$hora = $hora + 6;
			}
			$preco_final= sprintf("%d,%02d", $hora, $zero);
		
		//novo
		
	}else{
		$resut_soma = "0:00";
	}

	
	$sql = "INSERT INTO clientes (placa, entrada, saida, hora_total, data_saida, data_entrada, preco_total, data_hora) VALUES ('$placa', '$entrada', '$saida', '$resut_soma', '$data_saida', '$dataa', '$preco_final', '$data_hora')";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../index.php');
		
	endif;
	
endif;

