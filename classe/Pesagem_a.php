<?php

class Pesagem_a {

  private $id;
  private $entrada;
  private $peso;
  private $criado;
  private $porte;
  private $usuario;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getEntrada() {
    return $this->entrada;
  }

  public function setEntrada($entrada) {
    $this->entrada = $entrada;
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

  public function getPorte() {
    return $this->porte;
  }

  public function setPorte($porte) {
    $this->porte = $porte;
  }

  public function getUsuario() {
    return $this->usuario;
  }

  public function setUsuario($usuario) {
    $this->usuario = $usuario;
  }


}
