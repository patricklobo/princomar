<?php

/**
 *
 */
class EntradaControle
{

  function EntradaControle()
  {
    $this->entrada = new Entrada;
    $this->entradaBD = new EntradaBD;
    $this->sessao = new Sessao;
    $this->validador = new Validador;
    $this->sessao->verifica();
    require_once "visao/menu.php";
  }

  function Cadastrar()
  {
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    if(!empty($_POST)){
      $this->entrada->setPeixe($_POST['peixe']);
      $this->entrada->setPeso($_POST['peso']);
      $this->entrada->setData($this->validador->dataAtualBD());
      $this->entradaBD->setEntrada("I", $this->entrada);
      $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";
    }
    require_once "visao/entrada/cadastrar.php";
  }

}


 ?>
