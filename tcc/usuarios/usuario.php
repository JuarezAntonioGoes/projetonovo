<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");


  $mysqli = new mysqli('localhost', 'root', '', 'crud');

  $user = filter_input(INPUT_GET, 'nomeUsuario');
  $sql = "SELECT * FROM `tela_login` WHERE `login` = '{$user}'"; //monto a query


  $query = $mysqli->query( $sql ); //executo a query

  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo 'Usuário existente';
  }