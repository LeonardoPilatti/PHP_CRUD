<?php
require 'config.php';

$info = [];     //// ela será um array vazio para armazenar as informações do usuário;;
$id = filter_input(INPUT_GET, 'id');  /// para pegar o id que foi passado aqui quando foi clicado no "a" do index.php para vir para essa página de editar;

if ($id) { //// se ter o dado, irá fazer isso;
  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");    //// estou mandando o id, por isso deve ser o prepare, pois está enviando dado para o banco de dados e comparando se tem o id no banco;
  $sql->bindValue(':id', $id);
  $sql->execute();

  if ($sql->rowCount() > 0) {  /// caso ele tenha achado, será maior que um;
    $info = $sql->fetch( PDO::FETCH_ASSOC );

  } else {
    header("Location: index.php");
    exit;
  }
} else {
  header("Location: index.php");
  exit;
}
?>

<h1>Editar Usuário</h1>
<form method="POST" action="editar_action.php">
  <input type="hidden" name="id" value="<?=$info['id']; ?>" />
  <label for="">
    nome: <br />
    <input type="text" name="name" value="<?= $info['nome']; ?>" />
  </label>
  <br /><br />
  <label for="">
    email: <br />
    <input type="email" name="email" value="<?= $info['email']; ?>"/>
  </label>
  <br /><br />
  <input type="submit" value="Salvar">
</form>