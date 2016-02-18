<?php

class Entrada { 

private $id;
private $peso;
private $data;
private $peixe;
private $criado;
private $usuario;


public function getId() {
return $this->id;
}

public function setId($id) {
$this->id = $id;
}

public function getPeso() {
return $this->peso;
}

public function setPeso($peso) {
$this->peso = $peso;
}

public function getData() {
return $this->data;
}

public function setData($data) {
$this->data = $data;
}

public function getPeixe() {
return $this->peixe;
}

public function setPeixe($peixe) {
$this->peixe = $peixe;
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