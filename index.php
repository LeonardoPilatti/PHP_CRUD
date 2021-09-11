<?php
  require 'config.php';

  $lista = [];
  $sql = $pdo->query("SELECT * from usuarios"); /// aqui eu estou pegando os usuarios;

  if($sql->rowCount() > 0) {  //// se sql tiver dados armazenados, se for maior que 0 é porque tem;
    $lista = $sql->fetchAll( PDO::FETCH_ASSOC );
  }
?>

<a href="adicionar.php">ADICIONAR USUARIO</a>

<table border="1" width="100%">
  <tr>
    <th>ID</th>
    <th>NOME</th>
    <th>EMAIL</th>
    <th>AÇÕES</th>
  </tr>
  <?php foreach($lista as $usuario): ?>
    <tr>
      <td><?php echo $usuario['id']; ?></td>
      <td><?php echo $usuario['nome']; ?></td>
      <td><?php echo $usuario['email']; ?></td>
      <td>
        <!-- eu coloco o ID=$usuario para ele conseguir pegar em qual item eu estou clicando; -->
        <a href="editar.php?id=<?= $usuario['id']; ?>">[ Editar ]</a>
        <a href="excluir.php?id=<?= $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')" >[ Excluir ]</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>