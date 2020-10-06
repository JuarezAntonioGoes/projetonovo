<?php

session_start();

include_once 'conexao.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$data_start = explode('T', $dados['start']);
$data_start = $data_start[0] . " " . $data_start[1];

$data_end = explode('T', $dados['end']);
$data_end = $data_end[0] . " " . $data_end[1];

$query_event = "INSERT INTO events (title, color, start, end) VALUES (:title, :color, :start, :end)";

$insert_event = $conn->prepare($query_event);
$insert_event->bindParam(':title', $dados['title']);
$insert_event->bindParam(':color', $dados['color']);
$insert_event->bindParam(':start', $data_start);
$insert_event->bindParam(':end', $data_end);

if ($insert_event->execute()) {
    $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Evento ' . $dados['title'] . ' foi cadastrado com sucesso!</div>'];
    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Evento "' . $dados['title'] . '" foi cadastrado com sucesso!</div>';
} else {
    $retorna = ['sit' => false, 'msg' => '<div class="alert alert-success" role="alert">ERRO</div>'];
}



header('Content-Type: application/json');
echo json_encode($retorna);
