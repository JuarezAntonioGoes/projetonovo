<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';


if (isset($_POST['btn-editar-usu'])) {
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $nickn = mysqli_escape_string($connect, $_POST['nickname']);

    if (isset($_POST['admin'])) {
        $admin = 1;
    } else {
        $admin = 0;
    }
    date_default_timezone_set('America/Sao_Paulo');
    $data_hora = date('d/m/Y H:i:s');

    $id = mysqli_escape_string($connect, $_POST['id']);

    if (isset($_POST['senha'])) {
        $senha = mysqli_escape_string($connect, $_POST['senha']);
        $senha=md5($senha);

        $sql = "UPDATE usuarios SET nome = '$nome', login ='$nickn', admin = '$admin', data_hora = '$data_hora', senha='$senha'  WHERE id = '$id'";

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../alterar_usuario.php');
        else :
            $_SESSION['mensagem'] = "Erro ao atualizar";
            header('Location: ../alterar_usuario.php');
        endif;
    } else {

        $sql = "UPDATE usuarios SET nome = '$nome', login ='$nickn', admin = '$admin', data_hora = '$data_hora'  WHERE id = '$id'";

        if (mysqli_query($connect, $sql)) :
            $_SESSION['mensagem'] = "Atualizado com sucesso!";
            header('Location: ../alterar_usuario.php');
        else :
            $_SESSION['mensagem'] = "Erro ao atualizar";
            header('Location: ../alterar_usuario.php');
        endif;
    }
}
