<?php
// Conexão
require_once '../php_action/db_connect.php';

$id = $_POST['idEsc'];

//consultar no banco de dados
$result_usuario = "SELECT * FROM adicionar_cliente WHERE cpf = '$id'";
$resultado_usuario = mysqli_query($connect, $result_usuario);

//Verificar se encontrou resultado na tabela "usuarios"

	$row_usuario = mysqli_fetch_assoc($resultado_usuario);
        $dados = $row_usuario['nome']."/".$row_usuario['telefone'] ;
        echo $dados;
	
