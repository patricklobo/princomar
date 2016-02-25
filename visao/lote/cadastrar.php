<?php
$lote = new Lote;
$loteBD = new LoteBD;
$Usuario = new UsuarioBD;
$peixeBD = new PeixeBD;
$peixe = new Peixe;
$peixes = $peixeBD->getPeixeTipo("P");
$validador = new Validador;
$lista = $loteBD->getLote();
$entradaBD = new EntradaBD;
$entradas = $entradaBD->getEntradaSelectUltimos();
//debug($entradas);
$usuario = new UsuarioBD;
 ?>

<br>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Cadatrar lote</h3>
    </div>
    <?=$_REQUEST['alert']?>
    <div class="panel-body" >
      <form method="post" action="">
        <div class="form-group">
          <label>Peixe</label>
          <select name="peixe" required class="form-control">
            <option value="">Selecione...</option>
            <?php  foreach($peixes as $objpeixe): ?>
              <option value="<?=$objpeixe->getId()?>"><?=$objpeixe->getDescricao()?></option>
            <?php endforeach;?>
          </select>
      </div>
        <div class="form-group">
          <label>Data de validade</label>
          <input class="form-control" required name="validade">
        </div>
        <div class="form-group">
          <label>Entrada</label>
          <select name="entrada" required class="form-control">
            <?php
             foreach($entradas as $objentrada): ?>
             <?php
$objPeixe = $peixeBD->getPeixeUni($objentrada->getPeixe());
              ?>

              <option value="<?=$objentrada->getId()?>"><?=$objentrada->getId()?> - <?=$objPeixe->getDescricao()?> - <?=$objentrada->getPeso()?>Kg</option>
            <?php endforeach;?>
            <option value="">Selecione</option>

          </select>
        </div>
        <button type="submit" class="btn btn-default">Cadastrar</button>
      </form>
    </div>
  </div>

  <div class="panel panel-default">
      <div class="panel-body">
        <div class="panel panel-default">
          <div class="panel-heading">Listando lotes cadastrados </div>
          <table class="table table-striped">
            <tr>
              <td>
                <b>ID</b>
              </td>
              <td>
                <b>Entrada/Descrição/Peso</b>
              </td>
              <td>
                <b>Peixe</b>
              </td>
              <td>
                <b>Validade</b>
              </td>
              <td>
                <b>Criado</b>
              </td>
              <td>

              </td>
            </tr>

            <?php  foreach ($lista as $lista):  ?>
                <tr>
                <td>
                  <?=$lista->getId()?>
                </td>
                <td>
                  <?php
                  $entrada =$entradaBD->getEntradaUni($lista->getEntrada());
                  $peixe = $peixeBD->getPeixeUni($entrada->getPeixe());
                   ?>
                  <?=$entrada->getId()?>- <?=$peixe->getDescricao()?> - <?=$entrada->getPeso()?>Kg
                </td>
                <td>
                  <?=$peixeBD->getPeixeUni($lista->getPeixe())->getDescricao()?>
                </td>
                <td>
                  <?php
                   echo $validador->geraValidade($entrada->getData(), $lista->getValidade());
                  //echo date('d/m/Y', strtotime('+5 days', strtotime('14-07-2014')));
                   ?>
                </td>
                <td>
                  <?=$validador->dataTimeStampToFormatoBrasil($lista->getCriado())?>
                </td>
                <td>
                  <a href="<?=DIRETORIO?>usuario/gerenciar/excluir/<?=$lista->getId()?>">
                    <span class="icon-deletar glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                  </a>
                </td>

              </tr>
            <?php endforeach;?>
          </tr>
        </table>
      </div>
    </div>
  </div>
