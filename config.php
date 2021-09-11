<?php
  $db_name = 'test';
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = '';

  $pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host, $db_user, $db_pass); ///root e o que está vazio é a da senha;


  
  /*
  $sql = $pdo->query('SELECT * FROM usuarios');

  echo "TOTAL: ".$sql->rowCount();  /// para mostrar quantos dados tem dentro do array;

  $dados = $sql->fetchAll( PDO::FETCH_ASSOC );  /// esse dados está pegando todos os dados do sql e o PDO FETCH ASSOC é para ele associar os dados e não repetir;

  echo '<pre>';
  print_r($dados);

  */