<?php
require 'config.php';
require 'dao/UsuarioDaoMysql.php';

$usuarioDao = new UsuarioDaoMysql($pdo);

$usuario = false;     
$id = filter_input(INPUT_GET, 'id');  /// para pegar o id que foi passado aqui quando foi clicado no "a" do index.php para vir para essa página de editar;

if ($id) { //// se ter o dado, irá fazer isso;
  $usuario = $usuarioDao->findById($id);    /// aqui ele irá buscar o id no bano, se não tiver, irá retornar false e se ele achar o id no banco de dados, usuário irá ter a classe usuário com os dados do id dentro;
}

if($usuario === false) {
  header("Location: index.php");
  exit;
}
?>

<h1>Editar Usuário</h1>
<form method="POST" action="editar_action.php">
  <input type="hidden" name="id" value="<?=$usuario->getId(); ?>" />
  <label for="">
    nome: <br />
    <input type="text" name="name" value="<?= $usuario->getNome(); ?>" />
  </label>
  <br /><br />
  <label for="">
    email: <br />
    <input type="email" name="email" value="<?= $usuario->getEmail(); ?>"/>
  </label>
  <br /><br />
  <input type="submit" value="Salvar">
</form>
<button><a href="index.php">[ voltar ]</a></button>