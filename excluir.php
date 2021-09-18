<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');  /// para pegar o id que foi passado aqui quando foi clicado no "a" do index.php para vir para essa página de editar;

if ($id) { //// se ter o dado, irá fazer isso;
  $usuarioDao->delete($id);
} 
header("Location: index.php");
exit;