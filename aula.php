<?php

/**
 *
 */
class Cachorro
{
  private $apelido;
  private $tipo;
  private $raca;

  public function Cachorro()
  {
  }
  public function late(){
    return "Au au";
  }

 public function setApelido($apelido)
 {
   $this->apelido = $apelido;
 }

 public function getApelido()
 {
   return $this->apelido;
 }


}


/**
 *
 */
class Chacchorao extends Cachorro
{

}

$grande = new Cachorro();
$grande->setApelido("Lobo");

echo $grande->getApelido();

?>
