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

  function teste(){

    echo "teste";

  }

  function Cadastrar(){
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    if(!empty($_POST)){
      $this->lote->setPeixe($_POST['peixe']);
      $this->lote->setValidade;
      $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Cadastrado com sucesso!</div>";

    }

    require_once "visao/lote/cadastrar.php";
  }

}


 ?>
