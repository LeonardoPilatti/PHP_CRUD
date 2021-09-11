<?php 
  require 'config.php';

  /// aqui eu estou selecionando do input_POST, pois ele é do tipo POST no adicionar.php;
  $name = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  /// para ele validar email;

  if($name && $email) { /// caso tenha email e name;

    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email"); /// aqui estou buscando se tem o email já cadastrado no banco de dados;
    $sql->bindValue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0) {  /// aqui ele irá retornar a quantidade de itens que deu certo com a pesquisa, no caso, a quantidade de emails;
      /// para enviar os dados, é melhor usar o prepare() e depois executar, pois evita ataques hackers;
      $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
      $sql->bindValue(':name', $name);
      $sql->bindValue(':email', $email);
      $sql->execute();

      header("Location: index.php");
      exit;
    } else {
      header("Location: adicionar.php");    
      exit;
    }

  } else {  /// caso não tenha email ou name, ele irá retornar para o adicionar.php;
    header("Location: adicionar.php");    
    exit;
  }

  /// o código aqui para baixo não está refatorado e está aceitando emails iguais;
/*  
  <?php 
  require 'config.php';

  /// aqui eu estou selecionando do input_POST, pois ele é do tipo POST no adicionar.php;
  $name = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  /// para ele validar email;

  if($name && $email) { /// caso tenha email e name;
    /// para enviar os dados, é melhor usar o prepare() e depois executar, pois evita ataques hackers;
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, :email)");
    $sql->bindValue(':name', $name);
    $sql->bindValue(':email', $email);
    $sql->execute();

    header("Location: index.php");
    exit;

  } else {  /// caso não tenha email ou name, ele irá retornar para o adicionar.php;
    header("Location: adicionar.php");    
    exit;
  }

*/