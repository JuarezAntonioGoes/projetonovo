<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';
// Clear
function clear($input)
{
    global $connect;
    // sql
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}

if (isset($_POST['btn-add-obs'])) :

    $obs = clear($_POST['obs']);

    $id_servic = $_POST['id_servico'];


    $sql = "INSERT INTO observacao_servico (observacao, id_servico) VALUES ('$obs', '$id_servic')";


    if (mysqli_query($connect, $sql)) :
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header("Location: ../gerenciar_serviços/acompanhar_pedido.php?id=$id_servic");
    else :
        $_SESSION['mensagem'] = "Erro ao cadastrar";
    //header('Location: ../includes');

    endif;

endif;
