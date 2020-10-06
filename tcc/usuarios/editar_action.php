<?php

session_start();

require_once '../php_action/db_connect.php';
echo "nao entrou";
if (isset($_POST['btn-editar'])) {

    $id = $_GET['id'];
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $username = mysqli_escape_string($connect, $_POST['user']);
    $tipo = mysqli_escape_string($connect, $_POST['tipo']);

    echo "entrou";

    if (isset($_POST['password'])) {

        $password = mysqli_escape_string($connect, $_POST['senha']);

        $sql = "UPDATE tela_login SET nome = '$nome', login ='$username', tipo='$tipo', senha=' $password' WHERE id = '$id'";
    } else {
        $sql = "UPDATE tela_login SET nome = '$nome', login ='$username', tipo='$tipo' WHERE id = '$id'";
    }
    if (mysqli_query($connect, $sql)) {
        header('location: ./visualizar_usuarios.php');
        echo 'kkkkk';
    } else {
    }
}
