<?php

// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-edit'])) :

    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);
    $telefone = mysqli_escape_string($connect, $_POST['telefone']);

    //echo $_POST['cpf_edit'];




    $login = $_POST['cpf'];
    $sqll = "SELECT cpf FROM adicionar_cliente WHERE cpf = '$login'";




    $id = mysqli_escape_string($connect, $_GET['id']);


  
        $sql = "UPDATE adicionar_cliente SET nome = '$nome',cpf = '$cpf',telefone = '$telefone'  WHERE id = '$id'";

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../../gerenciar_cliente');
        else :
            $_SESSION['mensagem'] = "Erro ao atualizar";
            header('Location: ../../gerenciar_cliente');
        endif;
    
endif;
