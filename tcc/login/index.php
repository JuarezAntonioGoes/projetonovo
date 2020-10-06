<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<title> Sistema de cadastro de clientes</title>

	<link rel="stylesheet" href="../modo_noturno/style.css">
	<!--Import Google Icon Font-->
	<link href="../includes/icon.css" rel="stylesheet">
	<!--Import materialize.css-->

	<link rel="stylesheet" href="../includes/materialize.min.css">

	<link rel="stylesheet" href="../includes/style.css">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<script src="../includes/materialize.min.js"></script>
	<script src="../includes/jquery-3.4.1.min.js"></script>
	<script src="../includes/javascript.js"></script>


</head>
<?php
// Conexão
require_once '../conexao_banco/db_connect.php';


// Sessão
session_start();

$_SESSION['logado'] = 0;

// Botão enviar
if (isset($_POST['btn-entrar'])) :
	$erros = array();
	$login = mysqli_escape_string($connect, $_POST['login']);
	$senha = mysqli_escape_string($connect, $_POST['senha']);


	if (empty($login) or empty($senha)) :
		$erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
	else :
		// 105 OR 1=1 
		// 1; DROP TABLE teste

		$sql = "SELECT login FROM tela_login WHERE login = '$login'";
		$resultado = mysqli_query($connect, $sql);

		if (mysqli_num_rows($resultado) > 0) :
			$senha = md5($senha);

			$sql = "SELECT * FROM tela_login WHERE login = '$login' AND senha = '$senha'";



			$resultado = mysqli_query($connect, $sql);

			if (mysqli_num_rows($resultado) == 1) :
				$dados = mysqli_fetch_array($resultado);
				mysqli_close($connect);
				$_SESSION['logado'] = true;
				$_SESSION['id_usuario'] = $dados['id'];

				$_SESSION['admin'] = $dados['id'];


				header('Location: ../menu/menu.php');
			else :
				$erros[] = "<li> Usuário e senha não conferem </li>";
			endif;

		else :
			$erros[] = "<li> Usuário inexistente </li>";
		endif;

	endif;

endif;
?>
<style>
	body {
		background-color: #212121;
	}

	#myVideo {
		position: fixed;
		right: 0;
		bottom: 0;
		width: 100%;
		height: 100%;
	}
</style>
<video autoplay muted loop id="myVideo">
	<source src="../videos/apresentacao.mp4" type="video/mp4">
</video>


<div class="row">
	<div class="col container s1 m1 l4 "></div>
	<div class="col container s12 m12 l4 ">
		<div class="card" style="opacity: 0.9;">
			<div class="card-action   grey darken-4 white-text">
				<h1 class="center" style="opacity: 0.5;"> LOGIN </h1>
			</div>
			<div class="card-content">
				<div class="form-field">
					<?php
					if (!empty($erros)) :
						foreach ($erros as $erro) :
							echo "<div class='btn '>$erro</div>";
						endforeach;
					endif;
					?>

					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
						<div class="form-field">
							Username: <input type="text" name="login" placeholder="Nome do usuário" value="<?php echo isset($_COOKIE['login']) ? $_COOKIE['login'] : '' ?>"><br>
						</div><br>
						<div class="form-field">
							Senha: <input type="password" name="senha" placeholder="***************************" value="<?php echo isset($_COOKIE['senha']) ? $_COOKIE['senha'] : '' ?>"><br>
						</div><br>
						<button type="submit" name="btn-entrar" class="btn-large waves-effect waves-darke grey darken-1" style="width:100%;"> Entrar </button>
					</form>
				</div>
				<a href="" class="" style="color: red;">Conheça nosso Sistema</a>
			</div>
		</div>

	</div>
	<div class="col container s1 m1 l4 "></div>
</div>