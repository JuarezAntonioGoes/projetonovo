<?php
// Sessão
session_start();

// Verificação
if (($_SESSION['logado']) == 0) :
	header('Location: ../login/index.php');
endif;

// Dados
$id = $_SESSION['id_usuario'];
$sql = "SELECT * FROM usuarios WHERE id = '$id'";
