<?php

class PeixeBD {

  private $conexao;
  private $peixe;
  private $vetPeixe;
  private $sql = null;
  private $msg = null;

  function __construct() {
    $this->conexao = new Conexao();
    $this->conexao->conectar();
    $this->peixe = new Peixe();
  }

  public function getPeixe(){
    $this->vetPeixe = array();

    $this->sql = "SELECT * FROM peixe ";
    $this->conexao->execSQL($this->sql);
    $this->peixe = new Peixe();
    while ($row = $this->conexao->listarResultados()) {
      $this->peixe = new Peixe();
      $this->peixe ->setId($row['id']);
      $this->peixe ->setDescricao($row['descricao']);
      $this->peixe ->setTipo($row['tipo']);
      array_push($this->vetPeixe, $this->peixe);
    }
    return $this->vetPeixe;
  }

  public function getPeixeTipo($tipo){
    $this->vetPeixe = array();

    $this->sql = "SELECT * FROM peixe WHERE tipo = '$tipo' ORDER BY descricao ";
    $this->conexao->execSQL($this->sql);
    $this->peixe = new Peixe();
    while ($row = $this->conexao->listarResultados()) {
      $this->peixe = new Peixe();
      $this->peixe ->setId($row['id']);
      $this->peixe ->setDescricao($row['descricao']);
      $this->peixe ->setTipo($row['tipo']);
      array_push($this->vetPeixe, $this->peixe);
    }
    return $this->vetPeixe;
  }

  public function getPeixeUni($idpeixe) {
    $this->sql = "SELECT * FROM peixe WHERE id = '$idpeixe' ";
    $this->conexao->execSQL($this->sql);
    $this->peixe = new Peixe();
    while ($row = $this->conexao->listarResultados()) {
      $this->peixe = new Peixe();
      $this->peixe ->setId($row['id']);
      $this->peixe ->setDescricao($row['descricao']);
      $this->peixe ->setTipo($row['tipo']);
    }
    return $this->peixe;
  }

  public function setPeixe($operacao, $peixe) {

    $validador = new Validador();
    $id = $peixe ->getId();
    $descricao = $peixe ->getDescricao();
    $tipo = $peixe ->getTipo();

    switch ($operacao) {

      case 'I':
      $this->sql = "INSERT INTO `peixe`(`descricao` ,`tipo` ) VALUES ('$descricao' ,'$tipo' )";
      $this->conexao->execSQL ( $this->sql );
      return $this->conexao->getId();
      break;

      case 'A' :
      $this->sql = "UPDATE `peixe` SET `descricao`='$descricao' ,`tipo`='$tipo'  WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      case 'D':
      $this->sql = "DELETE FROM `peixe` WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      default:
      break;

    }
  }
}
