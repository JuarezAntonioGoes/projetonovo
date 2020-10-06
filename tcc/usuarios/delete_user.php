<?php

session_start();

require_once '../php_action/db_connect.php';

if (isset($_POST['delete_user'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM tela_login WHERE id = '$id'";

    echo'llll';

    if (mysqli_query($connect, $sql)) {
        header('location: ./visualizar_usuarios.php');
    }
}
