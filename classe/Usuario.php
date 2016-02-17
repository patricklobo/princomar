<?php

class Usuario {

  private $id;
  private $nome;
  private $nomeuser;
  private $senha;
  private $nivel;
  private $criado;
  private $alterado;


  public function getId() {
    return $this->id;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getNomeuser() {
    return $this->nomeuser;
  }

  public function setNomeuser($nomeuser) {
    $this->nomeuser = $nomeuser;
  }

  public function getSenha() {
    return $this->senha;
  }

  public function setSenha($senha) {
    $this->senha = $senha;
  }

  public function getNivel() {
    return $this->nivel;
  }

  public function descNivel($nivel){
    switch ($nivel) {
      case 1:
      return "Básico";
      break;

      case 3:
      return "Médio";
      break;
      
      case 9:
      return "Administrador";
      break;

      default:
      break;
    }
  }


  public function setNivel($nivel) {
    $this->nivel = $nivel;
  }

  public function getCriado() {
    return $this->criado;
  }

  public function setCriado($criado) {
    $this->criado = $criado;
  }

  public function getAlterado() {
    return $this->alterado;
  }

  public function setAlterado($alterado) {
    $this->alterado = $alterado;
  }


}
