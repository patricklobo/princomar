<?php

class Lote { 

private $id;
private $peixe;
private $usuario;
private $criado;
private $data;
private $validade;
private $entrada;


public function getId() {
return $this->id;
}

public function setId($id) {
$this->id = $id;
}

public function getPeixe() {
return $this->peixe;
}

public function setPeixe($peixe) {
$this->peixe = $peixe;
}

public function getUsuario() {
return $this->usuario;
}

public function setUsuario($usuario) {
$this->usuario = $usuario;
}

public function getCriado() {
return $this->criado;
}

public function setCriado($criado) {
$this->criado = $criado;
}

public function getData() {
return $this->data;
}

public function setData($data) {
$this->data = $data;
}

public function getValidade() {
return $this->validade;
}

public function setValidade($validade) {
$this->validade = $validade;
}

public function getEntrada() {
return $this->entrada;
}

public function setEntrada($entrada) {
$this->entrada = $entrada;
}


}