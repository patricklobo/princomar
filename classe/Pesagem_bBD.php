<?php

class Pesagem_bBD { 

private $conexao;
private $pesagem_b;
private $vetPesagem_b;
private $sql = null;
private $msg = null;

function __construct() {
$this->conexao = new Conexao();
$this->conexao->conectar();
$this->pesagem_b = new Pesagem_b();
}

public function getPesagem_b(){
$this->vetPesagem_b = array();

$this->sql = "SELECT * FROM pesagem_b ";
$this->conexao->execSQL($this->sql);
$this->pesagem_b = new Pesagem_b();
while ($row = $this->conexao->listarResultados()) {
$this->pesagem_b = new Pesagem_b();
$this->pesagem_b ->setId($row['id']);
$this->pesagem_b ->setLote($row['lote']);
$this->pesagem_b ->setPeso($row['peso']);
$this->pesagem_b ->setCriado($row['criado']);
$this->pesagem_b ->setUsuario($row['usuario']);
array_push($this->vetPesagem_b, $this->pesagem_b);
}
return $this->vetPesagem_b;
}

public function getPesagem_bUni($idpesagem_b) {
$this->sql = "SELECT * FROM pesagem_b WHERE id = '$idpesagem_b' ";
$this->conexao->execSQL($this->sql);
$this->pesagem_b = new Pesagem_b();
while ($row = $this->conexao->listarResultados()) {
$this->pesagem_b = new Pesagem_b();
$this->pesagem_b ->setId($row['id']);
$this->pesagem_b ->setLote($row['lote']);
$this->pesagem_b ->setPeso($row['peso']);
$this->pesagem_b ->setCriado($row['criado']);
$this->pesagem_b ->setUsuario($row['usuario']);
}
return $this->pesagem_b;
}

public function setPesagem_b($operacao, $pesagem_b) {

$validador = new Validador();
$id = $pesagem_b ->getId();
$lote = $pesagem_b ->getLote();
$peso = $pesagem_b ->getPeso();
$usuario = $_SESSION['usuarioId'];

switch ($operacao) {

case 'I':
$this->sql = "INSERT INTO `pesagem_b`(`lote` ,`peso` ,`usuario` ) VALUES ('$lote' ,'$peso' ,'$usuario' )";
$this->conexao->execSQL ( $this->sql );
return $this->conexao->getId();
break;

case 'A' :
$this->sql = "UPDATE `pesagem_b` SET `lote`='$lote' ,`peso`='$peso' ,`usuario`='$usuario'  WHERE id = '$id'";
$this->conexao->execSQL($this->sql);
break;

case 'D':
$this->sql = "DELETE FROM `pesagem_b` WHERE id = '$id'";
$this->conexao->execSQL($this->sql);
break;

default:
break;

}
}
}
