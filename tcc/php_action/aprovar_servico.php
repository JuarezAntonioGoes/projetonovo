<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';


if (isset($_POST['btn-aprovar'])) :

    $id = mysqli_escape_string($connect, $_POST['id']);
    $data = mysqli_escape_string($connect, $_POST['data']);
    $i = 2;

    date_default_timezone_set('America/Sao_Paulo');
    $hora = date('H:i:s');


    $sql = "UPDATE adicionar_servico SET situacao_pedido = '$i', data = '$data', hora = '$hora' WHERE id = '$id'";

    echo $sql;

    if (mysqli_query($connect, $sql)) :
        header('Location: ../gerenciar_serviços');
    else :

        header('Location: ../gerenciar_serviços');
    endif;
endif;
