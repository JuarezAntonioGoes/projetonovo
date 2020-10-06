<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-deletar'])) :

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM adicionar_servico WHERE id = '$id'";

	$sqll = "SELECT * FROM adicionar_servico WHERE id = '$id'";
	$resultado_situacao = mysqli_query($connect, $sqll);
	$dados = mysqli_fetch_array($resultado_situacao);

	if (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 0) :

		header('Location: ../gerenciar_serviços');
	elseif (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 2) :

		header('Location: ../gerenciar_serviços/servicos_validos.php');
	endif;

endif;


if (isset($_POST['btn-deletar-cliente'])) :

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM adicionar_cliente WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../gerenciar_cliente');

	else :
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../gerenciar_cliente');
	endif;

endif;

if (isset($_POST['btn-cancelar'])) :

	$id = mysqli_escape_string($connect, $_POST['id']);
	$i = 1;
	$sql = "UPDATE adicionar_servico SET situacao_pedido = '$i' WHERE id = '$id'";

	echo $sql;

	$sqll = "SELECT * FROM adicionar_servico WHERE id = '$id'";
	$resultado_situacao = mysqli_query($connect, $sqll);
	$dados = mysqli_fetch_array($resultado_situacao);

	if (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 0) :

		header('Location: ../gerenciar_serviços');
	elseif (mysqli_query($connect, $sql) && $dados['situacao_pedido'] == 2) :

		header('Location: ../gerenciar_serviços/servicos_validos.php');
	endif;
endif;


if (isset($_POST['btn-deletar-fechamento'])) :

	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM adicionar_servico WHERE id = '$id'";

	if (mysqli_query($connect, $sql)) :
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../gerenciar_serviços/servicos_fechados');

	else :
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../gerenciar_cliente');
	endif;

endif;



/*if(isset($_POST['btn-deletarr'])):
	
	$id = mysqli_escape_string($connect, $_POST['id']);

	$sql = "DELETE FROM adicionar_cliente WHERE id = '$id'";

	if(mysqli_query($connect, $sql)):
		$_SESSION['mensagem'] = "Deletado com sucesso!";
		header('Location: ../alterar_usuario.php');
		
	else:
		$_SESSION['mensagem'] = "Erro ao deletar";
		header('Location: ../alterar_usuario.php');
	endif;
	
endif;
*/
