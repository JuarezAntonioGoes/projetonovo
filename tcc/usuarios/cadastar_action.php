<?php
require_once '../php_action/db_connect.php';

function clear($input) {
	global $connect;
	// sql
	$var = mysqli_escape_string($connect, $input);
	// xss
	$var = htmlspecialchars($var);
	return $var;
}

if (isset($_POST['cadastrar'])) {

    $nome =  clear($_POST['nome']);
    $user =  clear( $_POST['user']);
    $senha =  md5(clear($_POST['senha']));
    $tipo =  clear($_POST['tipo']);

    $sql = "INSERT INTO tela_login (nome, login, senha, tipo) VALUES ('$nome', '$user', '$senha', '$tipo')";

    if (mysqli_query($connect, $sql)) :
        header('Location: ../gerenciar_serviços');
    else :

        header('Location: ../gerenciar_serviços');
    endif;
}