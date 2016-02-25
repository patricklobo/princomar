<?php

class LoteControle
{

  function LoteControle()
  {
    $this->lote = new Lote;
    $this->loteBD = new LoteBD;
    $this->sessao = new Sessao;
    $this->validador = new Validador;
    $this->sessao->verifica();
    require_once "visao/menu.php";

  }


  function Cadastrar(){
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    if(!empty($_POST)){
      $this->lote->setPeixe($_POST['peixe']);
      $this->lote->setValidade($_POST['validade']);
      $this->lote->setData($this->validador->dataAtualBD());
      $this->lote->setEntrada($_POST['entrada']);
      $this->loteBD->setLote("I", $this->lote);
      $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";
    }
    require_once "visao/lote/cadastrar.php";
  }

}


 ?>
