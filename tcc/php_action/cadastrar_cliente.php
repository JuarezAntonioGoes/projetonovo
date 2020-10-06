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

if(isset($_POST['btn-add'])):

    $nome = clear($_POST['nome']);
    $cpf = clear($_POST['cpf']);
    $celular = clear($_POST['telefone']);
   
	

    $sql = "INSERT INTO adicionar_cliente (nome, cpf, telefone) VALUES ('$nome', '$cpf', '$telefone')";


    if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Cadastrado com sucesso!";
		header('Location: ../gerenciar_cliente/index.php');
	else:
		$_SESSION['mensagem'] = "Erro ao cadastrar";
		header('Location: ../includes');
		
	endif;

endif;