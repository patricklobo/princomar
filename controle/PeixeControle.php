<?php

class PeixeControle
{

  function PeixeControle()
  {
    $this->peixe = new Peixe;
    $this->peixeBD = new PeixeBD;
    $this->sessao = new Sessao;
    $this->validador = new Validador;
    $this->sessao->verifica();
    require_once "visao/menu.php";
  }

  function excluir($id){
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    $this->peixe->setId($id);
    $this->peixeBD->setPeixe("D", $this->peixe);
  }

  function gerenciar(){
    $this->sessao->permissao(9);
    if(!empty($_REQUEST['excluir'])){
      $this->excluir($_REQUEST['excluir']);
      $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Usuário deletado com sucesso!</div>";
    }
    if(!empty($_REQUEST['editar'])){
      $this->peixe = $this->peixeBD->getpeixeUni($_REQUEST['editar']);
      $_REQUEST['peixe'] = $this->peixe;
    }

    if(!empty($_POST)){
      if(!empty($_REQUEST['editar']) && $_POST['id'] > 0){
        $this->peixe->setId($_POST['id']);
        $this->peixe->setDescricao($_POST['descricao']);
        $this->peixe->setTipo($_POST['tipo']);
          if($this->peixeBD->setPeixe("A", $this->peixe)){
          }
        $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Peixe atualizado com sucesso!</div>";
      }else{
        $this->peixe->setId($_POST['id']);
        $this->peixe->setDescricao($_POST['descricao']);
        $this->peixe->setTipo($_POST['tipo']);
        if($this->peixeBD->setPeixe("I", $this->peixe)){
          $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Peixe cadastrado com sucesso!</div>";
        }
      }
    }
    require_once "visao/peixe/gerenciar.php";
  }
}


 ?>
