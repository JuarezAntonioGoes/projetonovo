<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-finalizar'])) :

	$id = mysqli_escape_string($connect, $_POST['id']);
	$i = 3;
	$sql = "UPDATE adicionar_servico SET situacao_pedido = '$i' WHERE id = '$id'";

	echo $sql;

	$sqll = "SELECT * FROM adicionar_servico WHERE id = '$id'";
	$resultado_situacao = mysqli_query($connect, $sqll);
	$dados = mysqli_fetch_array($resultado_situacao);

	if (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 3) :

		header('Location: ../gerenciar_serviços/servicos_fechados_concluidos');
	elseif (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 2) :

		header('Location: ../gerenciar_serviços/servicos_fechados_concluidos.php');
	endif;

endif;