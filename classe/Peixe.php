<?php

class Peixe {

  private $id;
  private $descricao;
  private $tipo;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function descTipo($tipo) {
    switch ($tipo) {
      case 'P':
      return "Processado";
      break;
      case 'B':
      return "Bruto";
      break;
      default:
      # code...
      break;
    }
  }


  public function getDescricao() {
    return $this->descricao;
  }

  public function setDescricao($descricao) {
    $this->descricao = $descricao;
  }

  public function getTipo() {
    return $this->tipo;
  }

  public function setTipo($tipo) {
    $this->tipo = $tipo;
  }


}
