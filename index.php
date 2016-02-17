<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$url = explode("/",$_GET["path"]);
$raiz = "";
for ($i=0; $i < count($url) - 1; $i++) {
  $raiz .= "../";
}
$_REQUEST['raiz'] = $raiz;
define("DIRETORIO", $raiz);
$controle = $url[0];
$acao = $url[1];
foreach ($url as $key => $value) {
  if($key > 1 && $key%2 == 0){
    $_REQUEST[$value] = $url[($key + 1)];
  }
}
require_once "classe/Sessao.php";
$sessao = new Sessao;
if($controle == "" && $acao == ""){
  if($sessao -> verifica()){
    header("Location: usuario/home");
  } else {
    header("Location: usuario/login");
  }
}

function debug($x){
  echo "<pre>";
  print_r($x);
  echo "</pre>";
}

require_once 'visao/topo.php';
echo "<title>$controle - $acao</title>";


$controle .= "Controle";



require_once 'controle/'.$controle.'.php';

$obj = new $controle();
if($acao != ""){
  $obj->$acao();
} else {
  $obj->index();
}

require_once 'visao/rodape.php';
