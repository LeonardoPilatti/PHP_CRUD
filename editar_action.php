<?php 
  require 'config.php';

  /// aqui eu estou selecionando do input_POST, pois ele é do tipo POST no adicionar.php;
  $id = filter_input(INPUT_POST, 'id');
  $name = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  /// para ele validar email;

  if($id && $name && $email) { /// caso tenha id, email e name;
    $sql = $pdo->prepare("UPDATE usuarios SET nome= :name, email = :email WHERE id = :id");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;

  } else {  /// caso não tenha email ou name, ele irá retornar para o adicionar.php;
    header("Location: adicionar.php");    
    exit;
  }

