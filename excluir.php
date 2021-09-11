<?php
require 'config.php';

$id = filter_input(INPUT_GET, 'id');  /// para pegar o id que foi passado aqui quando foi clicado no "a" do index.php para vir para essa página de editar;

if ($id) { //// se ter o dado, irá fazer isso;
  $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
  $sql->bindValue(":id", $id);
  $sql->execute();
} 
header("Location: index.php");
exit;