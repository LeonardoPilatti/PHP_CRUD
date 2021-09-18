<?php 
class Usuario {
  private $id;
  private $nome;
  private $email;

  public function getId() {
    return $this->id;
  }
  public function setId($i) {
    $this->id = trim($i);      //// o trim() é para tirar possíveis espaços que possa ter;
  }

  public function getNome() {
    return $this->nome;
  }
  public function setNome($n) {
    $this->nome = ucwords(trim($n));    /// o ucwords é para a primeira letra de cada nome ficar em maiúscula e depois o trim para remover espaços antes e depois das palavras (espaços a mais);
  }

  public function getEmail() {
    return $this->email;
  }
  public function setEmail($e) {
    $this->email = strtolower(trim($e));  /// o strtolower é para deixar todas as letras minúsculas, como é email, é melhor fazer assim;
  }
}

interface UsuarioDAO {    /// esse interface é para todos os banco de dados seguirem essas funções, terem elas obrigatoriamente;
  public function add(Usuario $u);  /// adicionar usuário novo;
  public function findAll();  /// retornar todos os usuários;
  public function findById($id);  /// pesquisar por ID;
  public function findByEmail($email);
  public function update(Usuario $u); /// atualizar usuário /// recebe um objeto da classe Usuário;
  public function delete($id);  /// deletar pelo ID;
}