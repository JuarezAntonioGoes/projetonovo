<?php

session_start();

include_once 'conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$data_start = explode('T', $dados['start']);
$data_start = $data_start[0] . " " . $data_start[1];

$data_end = explode('T', $dados['end']);
$data_end = $data_end[0] . " " . $data_end[1];

$query_event = "UPDATE events SET title=:title, color=:color, start=:start, end=:end WHERE id=:id";

$update_event = $conn->prepare($query_event);
$update_event->bindParam(':title', $dados['title']);
$update_event->bindParam(':color', $dados['color']);
$update_event->bindParam(':start', $data_start);
$update_event->bindParam(':end', $data_end);
$update_event->bindParam(':id', $dados['id']);

if ($update_event->execute()) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento ' . $dados['title'] . ' foi editado com sucesso!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento "' . $dados['title'] . '" foi Editado com sucesso!</div>';
} else {
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-success" role="alert">ERRO</div>'];
}



header('Content-Type: application/json');
echo json_encode($retorna);
