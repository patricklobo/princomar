<?php

class Pesagem_aControle
{

  function Pesagem_aControle()
  {
    $this->pesagem_a = new Pesagem_a;
    $this->pesagem_aBD = new Pesagem_aBD;
    $this->sessao = new Sessao;
    $this->validador = new Validador;
    $this->sessao->verifica();
    require_once "visao/menu.php";
  }


  function Cadastrar(){
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    if(!empty($_POST)){
      $this->pesagem_a->setPeso($_POST['peso']);
      $this->pesagem_a->setPorte($_POST['porte']);
      $this->pesagem_a->setEntrada($_POST['entrada']);
      $this->pesagem_aBD->setPesagem_a("I", $this->pesagem_a);
      $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";
    }
    require_once "visao/pesagem_a/cadastrar.php";
  }

}


 ?>
