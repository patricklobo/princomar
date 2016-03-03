<?php

class Pesagem_b { 

private $id;
private $lote;
private $peso;
private $criado;
private $usuario;


public function getId() {
return $this->id;
}

public function setId($id) {
$this->id = $id;
}

public function getLote() {
return $this->lote;
}

public function setLote($lote) {
$this->lote = $lote;
}

public function getPeso() {
return $this->peso;
}

public function setPeso($peso) {
$this->peso = $peso;
}

public function getCriado() {
return $this->criado;
}

public function setCriado($criado) {
$this->criado = $criado;
}

public function getUsuario() {
return $this->usuario;
}

public function setUsuario($usuario) {
$this->usuario = $usuario;
}


}