<?php

class LoteBD { 

private $conexao;
private $lote;
private $vetLote;
private $sql = null;
private $msg = null;

function __construct() {
$this->conexao = new Conexao();
$this->conexao->conectar();
$this->lote = new Lote();
}

public function getLote(){
$this->vetLote = array();

$this->sql = "SELECT * FROM lote ";
$this->conexao->execSQL($this->sql);
$this->lote = new Lote();
while ($row = $this->conexao->listarResultados()) {
$this->lote = new Lote();
$this->lote ->setId($row['id']);
$this->lote ->setPeixe($row['peixe']);
$this->lote ->setUsuario($row['usuario']);
$this->lote ->setCriado($row['criado']);
$this->lote ->setData($row['data']);
$this->lote ->setValidade($row['validade']);
$this->lote ->setEntrada($row['entrada']);
array_push($this->vetLote, $this->lote);
}
return $this->vetLote;
}

public function getLoteUni($idlote) {
$this->sql = "SELECT * FROM lote WHERE id = '$idlote' ";
$this->conexao->execSQL($this->sql);
$this->lote = new Lote();
while ($row = $this->conexao->listarResultados()) {
$this->lote = new Lote();
$this->lote ->setId($row['id']);
$this->lote ->setPeixe($row['peixe']);
$this->lote ->setUsuario($row['usuario']);
$this->lote ->setCriado($row['criado']);
$this->lote ->setData($row['data']);
$this->lote ->setValidade($row['validade']);
$this->lote ->setEntrada($row['entrada']);
}
return $this->lote;
}

public function setLote($operacao, $lote) {

$validador = new Validador();
$id = $lote ->getId();
$peixe = $lote ->getPeixe();
$usuario = $_SESSION['usuarioId'];
$data = $lote ->getData();
$validade = $lote ->getValidade();
$entrada = $lote ->getEntrada();

switch ($operacao) {

case 'I':
$this->sql = "INSERT INTO `lote`(`peixe` ,`usuario` ,`data` ,`validade` ,`entrada` ) VALUES ('$peixe' ,'$usuario' ,'$data' ,'$validade' ,'$entrada' )";
$this->conexao->execSQL ( $this->sql );
return $this->conexao->getId();
break;

case 'A' :
$this->sql = "UPDATE `lote` SET `peixe`='$peixe' ,`usuario`='$usuario' ,`data`='$data' ,`validade`='$validade' ,`entrada`='$entrada'  WHERE id = '$id'";
$this->conexao->execSQL($this->sql);
break;

case 'D':
$this->sql = "DELETE FROM `lote` WHERE id = '$id'";
$this->conexao->execSQL($this->sql);
break;

default:
break;

}
}
}
