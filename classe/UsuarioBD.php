<?php

class UsuarioBD {

  private $conexao;
  private $usuario;
  private $vetUsuario;
  private $sql = null;
  private $msg = null;

  function __construct() {
    $this->conexao = new Conexao();
    $this->conexao->conectar();
    $this->usuario = new Usuario();
  }

  public function getUsuario(){
    $this->vetUsuario = array();
    $this->sql = "SELECT * FROM usuario ";
    $this->conexao->execSQL($this->sql);
    $this->usuario = new Usuario();
    while ($row = $this->conexao->listarResultados()) {
      $this->usuario = new Usuario();
      $this->usuario ->setId($row['id']);
      $this->usuario ->setNome($row['nome']);
      $this->usuario ->setNomeuser($row['nomeuser']);
      $this->usuario ->setNivel($row['nivel']);
      $this->usuario ->setCriado($row['criado']);
      $this->usuario ->setAlterado($row['alterado']);
      array_push($this->vetUsuario, $this->usuario);
    }
    return $this->vetUsuario;
  }

  public function login($nomeuser, $senha) {
    $this->sql = "SELECT * FROM usuario WHERE nomeuser = '$nomeuser' AND senha = '".sha1($senha)."' ";
    $this->conexao->execSQL($this->sql);
    $this->usuario = new Usuario();
    while ($row = $this->conexao->listarResultados()) {
      $this->usuario = new Usuario();
      $this->usuario ->setId($row['id']);
      $this->usuario ->setNome($row['nome']);
      $this->usuario ->setNomeuser($row['nomeuser']);
      $this->usuario ->setSenha($row['senha']);
      $this->usuario ->setNivel($row['nivel']);
      $this->usuario ->setCriado($row['criado']);
      $this->usuario ->setAlterado($row['alterado']);
    }
    return $this->usuario;
  }

  public function getUsuarioUni($idusuario) {
    $this->sql = "SELECT * FROM usuario WHERE id = '$idusuario' ";
    $this->conexao->execSQL($this->sql);
    $this->usuario = new Usuario();
    while ($row = $this->conexao->listarResultados()) {
      $this->usuario = new Usuario();
      $this->usuario ->setId($row['id']);
      $this->usuario ->setNome($row['nome']);
      $this->usuario ->setNomeuser($row['nomeuser']);
      $this->usuario ->setNivel($row['nivel']);
    }
    return $this->usuario;
  }

  public function setUsuario($operacao, $usuario) {

    $validador = new Validador();
    $id = $usuario ->getId();
    $nome = $usuario ->getNome();
    $nomeuser = $usuario ->getNomeuser();
    $senha = $usuario ->getSenha();
    $nivel = $usuario ->getNivel();
    $alterado = $usuario ->getAlterado();

    switch ($operacao) {

      case 'I':
      $this->sql = "INSERT INTO `usuario`(`nome` ,`nomeuser` ,`senha` ,`nivel` ) VALUES ('$nome' ,'$nomeuser' ,'".sha1($senha)."' ,'$nivel' )";
      $this->conexao->execSQL ( $this->sql );
      return $this->conexao->getId();
      break;

      case 'A':
      $this->sql = "UPDATE `usuario` SET `nome`='$nome' ,`nomeuser`='$nomeuser' ,`nivel`='$nivel' ,`alterado`='$alterado'  WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;
      case 'P':
      $this->sql = "UPDATE `usuario` SET `senha`='".sha1($senha)."' WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      case 'S':
      $this->sql = "UPDATE `usuario` SET `nome`='$nome' ,`nomeuser`='$nomeuser' ,`senha`='".sha1($senha)."' ,`nivel`='$nivel' ,`alterado`='$alterado'  WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      case 'D':
      $this->sql = "DELETE FROM `usuario` WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      default:
      break;

    }
  }
}
