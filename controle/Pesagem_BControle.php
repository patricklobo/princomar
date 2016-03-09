<?php

class Pesagem_bControle
{

  function Pesagem_bControle(){
    $this->pesagem_b = new Pesagem_b;
    $this->pesagem_bBD = new Pesagem_bBD;
    $this->sessao = new Sessao;
    $this->validador = new Validador;
    $this->sessao->verifica();
    require_once "visao/menu.php";
  }


  function Cadastrar(){
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    if(!empty($_POST)){
      $this->pesagem_b->setPeso($_POST['peso']);
      $this->pesagem_b->setLote($_POST['lote']);
      $this->pesagem_bBD->setPesagem_b("I", $this->pesagem_b);
      $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";
    }
    require_once "visao/pesagem_b/cadastrar.php";
  }

}


 ?>
