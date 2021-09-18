<?php 
  require 'config.php';
  require 'dao/UsuarioDaoMysql.php';

  $usuarioDao = new UsuarioDaoMysql($pdo);

  /// aqui eu estou selecionando do input_POST, pois ele é do tipo POST no adicionar.php;
  $id = filter_input(INPUT_POST, 'id');
  $name = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  /// para ele validar email;

  if($id && $name && $email) { /// caso tenha id, email e name;
    $usuario = new Usuario();
    $usuario->setId($id);
    $usuario->setNome($name);
    $usuario->setEmail($email);

    $usuarioDao->update($usuario);

    header("Location: index.php");
    exit;

  } else {  /// caso não tenha email ou name, ele irá retornar para o adicionar.php;
    header("Location: editar.php?id=".$id);    
    exit;
  }

