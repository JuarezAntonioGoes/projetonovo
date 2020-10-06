<?php
// Sessão



session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input)
{
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if (isset($_POST['btn-add'])) :

	$nome = clear($_POST['nome']);
	$cpf = clear($_POST['cpf']);
	$tecnico = clear($_POST['tec']);
	$produto = clear($_POST['produto']);
	$serie = clear($_POST['serie']);
	$defeito = clear($_POST['defeito']);
	$observacao = clear($_POST['observacao']);

	if (isset($_FILES['imagem'])) {
		$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
		$novo_nome = md5(time()) . $extensao;
		$diretorio = "../upload/";

		move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

	}else{
		$novo_nome = NULL;
	}

	$i = 0;

	date_default_timezone_set('America/Sao_Paulo');
	$hora = date('H:i:s');
	$data = date('yy-m-d', strtotime(' + 3 days'));


	echo $data;


	$sql = "INSERT INTO adicionar_servico (nome, cpf, tecnico, produto, serie, defeito, observacao, data, situacao_pedido, hora, imagem) VALUES ('$nome', '$cpf', '$tecnico', '$produto', '$serie', '$defeito', '$observacao','$data' ,'$i', '$hora', '$novo_nome')";


	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../gerenciar_serviços');
	else :
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		//header('Location: ../includes');

	endif;

endif;
