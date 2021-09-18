<?php 
  require 'config.php';
  require 'dao/UsuarioDaoMysql.php';

  $usuarioDao = new UsuarioDaoMysql($pdo);

  /// aqui eu estou selecionando do input_POST, pois ele é do tipo POST no adicionar.php;
  $name = filter_input(INPUT_POST, 'name');
  $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);  /// para ele validar email;

  if($name && $email) { /// caso tenha email e name;

    if($usuarioDao->findByEmail($email) === false) {  /// se procurou no banco e não achou algum email igual, então ele irá adicionar;
      $novoUsuario = new Usuario();
      $novoUsuario->setNome($name);
      $novoUsuario->setEmail($email);

      $usuarioDao->add($novoUsuario);

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