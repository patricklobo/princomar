<?php

class Pesagem_aBD {

  private $conexao;
  private $pesagem_a;
  private $vetPesagem_a;
  private $sql = null;
  private $msg = null;

  function __construct() {
    $this->conexao = new Conexao();
    $this->conexao->conectar();
    $this->pesagem_a = new Pesagem_a();
  }

  public function getPesagem_a(){
    $this->vetPesagem_a = array();

    $this->sql = "SELECT * FROM pesagem_a ";
    $this->conexao->execSQL($this->sql);
    $this->pesagem_a = new Pesagem_a();
    while ($row = $this->conexao->listarResultados()) {
      $this->pesagem_a = new Pesagem_a();
      $this->pesagem_a ->setId($row['id']);
      $this->pesagem_a ->setEntrada($row['entrada']);
      $this->pesagem_a ->setPeso($row['peso']);
      $this->pesagem_a ->setCriado($row['criado']);
      $this->pesagem_a ->setPorte($row['porte']);
      $this->pesagem_a ->setUsuario($row['usuario']);
      array_push($this->vetPesagem_a, $this->pesagem_a);
    }
    return $this->vetPesagem_a;
  }

  public function getPesagem_aUni($idpesagem_a) {
    $this->sql = "SELECT * FROM pesagem_a WHERE id = '$idpesagem_a' ";
    $this->conexao->execSQL($this->sql);
    $this->pesagem_a = new Pesagem_a();
    while ($row = $this->conexao->listarResultados()) {
      $this->pesagem_a = new Pesagem_a();
      $this->pesagem_a ->setId($row['id']);
      $this->pesagem_a ->setEntrada($row['entrada']);
      $this->pesagem_a ->setPeso($row['peso']);
      $this->pesagem_a ->setCriado($row['criado']);
      $this->pesagem_a ->setPorte($row['porte']);
      $this->pesagem_a ->setUsuario($row['usuario']);
    }
    return $this->pesagem_a;
  }

  public function setPesagem_a($operacao, $pesagem_a) {

    $validador = new Validador();
    $id = $pesagem_a ->getId();
    $entrada = $pesagem_a ->getEntrada();
    $peso = $pesagem_a ->getPeso();
    $porte = $pesagem_a ->getPorte();
    $usuario = $_SESSION['id'];

    switch ($operacao) {

      case 'I':
      $this->sql = "INSERT INTO `pesagem_a`(`entrada` ,`peso` ,`porte` ,`usuario` ) VALUES ('$entrada' ,'$peso' ,'$porte' ,'$usuario' )";
      $this->conexao->execSQL ( $this->sql );
      return $this->conexao->getId();
      break;

      case 'A' :
      $this->sql = "UPDATE `pesagem_a` SET `entrada`='$entrada' ,`peso`='$peso' ,`porte`='$porte' ,`usuario`='$usuario'  WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      case 'D':
      $this->sql = "DELETE FROM `pesagem_a` WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      default:
      break;

    }
  }
}
