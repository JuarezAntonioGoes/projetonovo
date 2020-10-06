<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_GET['id'])) :
 
    $id = mysqli_escape_string($connect, $_GET['id']);
    $id_servico = mysqli_escape_string($connect, $_GET['id_ser']);
    $sql = "DELETE FROM observacao_servico WHERE id = '$id'";
    
    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Deletado com sucesso!";
    header("Location: ../gerenciar_serviços/acompanhar_pedido.php?id=$id_servico");

    else :
        $_SESSION['mensagem'] = "Erro ao deletar";
    //header('Location: ../gerenciar_cliente');
    endif;

endif;
