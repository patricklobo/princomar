<?php

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

/**
* Description of Sessao
*
* @author patricklobo
*/
class Sessao {

  public function verifica() {
    if (!isset($_SESSION)) session_start();
    if (!isset($_SESSION['id'])) {
      session_destroy();
      header("Location: ../usuario/login");
    } else {
      $_REQUEST['usuariologado'] = $this->getSessao();
    }
  }

  public function permissao($x){
    if($this->getSessao()['nivel'] >= $x){
      return true;
    } else {
      ?>
      <script type="text/javascript">
        alert("Você não tem permissão para isso!");
        window.location = "<?=$_SERVER['HTTP_REFERER']?>";
      </script>
      <?php
    }
  }



  public function Sair() {
      session_start();
      session_destroy();
      header("Location: ../usuario/login");
  }


  public function getSessao() {
    return $_SESSION;
  }

  public function login($usuario, $senha) {
    $usuarios = new UsuarioBD();
    $user = $usuarios->login($usuario, $senha);
    if (!isset($_SESSION))
                    session_start();
    if($user->getId() > 0){
      $_SESSION['id'] = $user->getId();
      $_SESSION['nome'] = $user->getNome();
      $_SESSION['nomeuser'] = $user->getNomeuser();
      $_SESSION['nivel'] = $user->getNivel();
      return true;
    } else {
      session_destroy();
      return false;
    }
  }
}
