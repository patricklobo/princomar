<?php

class EntradaBD {

  private $conexao;
  private $entrada;
  private $vetEntrada;
  private $sql = null;
  private $msg = null;

  function __construct() {
    $this->conexao = new Conexao();
    $this->conexao->conectar();
    $this->entrada = new Entrada();
  }

  public function getEntrada(){
    $this->vetEntrada = array();

    $this->sql = "SELECT * FROM entrada ";
    $this->conexao->execSQL($this->sql);
    $this->entrada = new Entrada();
    while ($row = $this->conexao->listarResultados()) {
      $this->entrada = new Entrada();
      $this->entrada ->setId($row['id']);
      $this->entrada ->setPeso($row['peso']);
      $this->entrada ->setData($row['data']);
      $this->entrada ->setPeixe($row['peixe']);
      $this->entrada ->setCriado($row['criado']);
      $this->entrada ->setUsuario($row['usuario']);
      array_push($this->vetEntrada, $this->entrada);
    }
    return $this->vetEntrada;
  }

  public function getEntradaUltimos($pagina){
    $porpagina = 10;
    $inipafina = ($porpagina * $pagina);

    $this->vetEntrada = array();
    $this->sql = "SELECT * FROM entrada ORDER BY id DESC LIMIT $inipafina, $porpagina";
    $this->conexao->execSQL($this->sql);
    $this->entrada = new Entrada();
    while ($row = $this->conexao->listarResultados()) {
      $this->entrada = new Entrada();
      $this->entrada ->setId($row['id']);
      $this->entrada ->setPeso($row['peso']);
      $this->entrada ->setData($row['data']);
      $this->entrada ->setPeixe($row['peixe']);
      $this->entrada ->setCriado($row['criado']);
      $this->entrada ->setUsuario($row['usuario']);
      array_push($this->vetEntrada, $this->entrada);
    }
    return $this->vetEntrada;
  }

  public function getEntradaUni($identrada) {
    $this->sql = "SELECT * FROM entrada WHERE id = '$identrada' ";
    $this->conexao->execSQL($this->sql);
    $this->entrada = new Entrada();
    while ($row = $this->conexao->listarResultados()) {
      $this->entrada = new Entrada();
      $this->entrada ->setId($row['id']);
      $this->entrada ->setPeso($row['peso']);
      $this->entrada ->setData($row['data']);
      $this->entrada ->setPeixe($row['peixe']);
      $this->entrada ->setCriado($row['criado']);
      $this->entrada ->setUsuario($row['usuario']);
    }
    return $this->entrada;
  }

  public function setEntrada($operacao, $entrada) {

    $validador = new Validador();
    $id = $entrada ->getId();
    $peso = $entrada ->getPeso();
    $data = $entrada ->getData();
    $peixe = $entrada ->getPeixe();
    $usuario = $_SESSION['id'];

    switch ($operacao) {

      case 'I':
      $this->sql = "INSERT INTO `entrada`(`peso` ,`data` ,`peixe` ,`usuario` ) VALUES ('$peso' ,'$data' ,'$peixe' ,'$usuario' )";
      $this->conexao->execSQL ( $this->sql );
      return $this->conexao->getId();
      break;

      case 'A' :
      $this->sql = "UPDATE `entrada` SET `peso`='$peso' ,`data`='$data' ,`peixe`='$peixe' ,`usuario`='$usuario'  WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      case 'D':
      $this->sql = "DELETE FROM `entrada` WHERE id = '$id'";
      $this->conexao->execSQL($this->sql);
      break;

      default:
      break;

    }
  }
}
