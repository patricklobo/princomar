<?php
foreach (glob("classe/*.php") as $filename) {
  require_once $filename;
}

class UsuarioControle
{
  function UsuarioControle(){
    $this->usuario = new Usuario;
    $this->usuarioBD = new UsuarioBD;
    $this->sessao = new Sessao;
    $this->validador = new Validador;
  }

  function login(){
    require_once "visao/usuario/login.php";
    if(!empty($_POST)){
      if($this->sessao->login($_POST['nomeuser'], $_POST['senha'])){
        header("Location: ../usuario/home");
      } else {
      }
    }
  }

  function home(){
    $this->sessao->verifica();
    $this->sessao->permissao(1);
    require_once "visao/menu.php";
    echo "funcionando";
  }

  function novasenha(){
    $this->sessao->verifica();
    $this->sessao->permissao(1);
    if(!empty($_POST)){
      if($_POST['senha'] == $_POST['senha2']){
        $this->usuario->setId($_REQUEST['usuariologado']['id']);
        $this->usuario->setSenha($_POST['senha']);
        $this->usuarioBD->setUsuario("P", $this->usuario);
        $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Senha alterada com sucesso!</div>";
      } else {
        $_REQUEST['alert'] = "<div class='alert alert-warning' role='alert'>Senhas não são iguals! </div>";
      }

    }
    require_once "visao/menu.php";
    require_once "visao/usuario/novasenha.php";
  }

  function excluir($id){
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    $this->usuario->setId($id);
    $this->usuarioBD->setUsuario("D", $this->usuario);
  }

  function gerenciar(){
    $this->sessao->verifica();
    $this->sessao->permissao(9);
    if(!empty($_REQUEST['excluir'])){
      $this->excluir($_REQUEST['excluir']);
      $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Usuário deletado com sucesso!</div>";
    }
    if(!empty($_REQUEST['editar'])){
      $this->usuario = $this->usuarioBD->getUsuarioUni($_REQUEST['editar']);
      $_REQUEST['usuario'] = $this->usuario;
    }

    if(!empty($_POST)){
      if(!empty($_REQUEST['editar']) && $_POST['id'] > 0){
        $this->usuario->setId($_POST['id']);
        $this->usuario->setNome($_POST['nome']);
        $this->usuario->setNomeuser($_POST['nomeuser']);
        $this->usuario->setNivel($_POST['nivel']);
        $this->usuario->setAlterado($this->validador->dataHoraAtual());
        if($_POST['senha'] != ""){
          if($_POST['senha'] == $_POST['senha2']){
            $this->usuario->setSenha($_POST['senha']);
            if($this->usuarioBD->setUsuario("S", $this->usuario)){
            }
          }
        } else {
          if($this->usuarioBD->setUsuario("A", $this->usuario)){
          }
        }
        $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Usuário atualizado com sucesso!</div>";
      }elseif($_POST['senha'] == $_POST['senha2']){
        $this->usuario->setNome($_POST['nome']);
        $this->usuario->setNomeuser($_POST['nomeuser']);
        $this->usuario->setNivel($_POST['nivel']);
        $this->usuario->setSenha($_POST['senha']);
        if($this->usuarioBD->setUsuario("I", $this->usuario)){
          $_REQUEST['alert'] = "<div class='alert alert-success' role='alert'>Usuário salvo com sucesso!</div>";
        }
      } else {
        $_REQUEST['alert'] = "<div class='alert alert-warning' role='alert'>Senhas não são iguals! </div>";
      }
    }

    require_once "visao/menu.php";
    require_once "visao/usuario/gerenciar.php";
  }

  function sair(){
    $this->sessao->sair();
  }

}


?>
