<?php
$pesagem_a = new Pesagem_a;
$Pesagem_aBD = new Pesagem_aBD;
$usuario = new UsuarioBD;
$peixeBD = new PeixeBD;
$peixe = new Peixe;
$peixes = $peixeBD->getPeixeTipo("P");
$validador = new Validador;
$lista = $Pesagem_aBD->getPesagem_a();
$entradaBD = new EntradaBD;
$entradas = $entradaBD->getEntradaSelectUltimos();
$portes = array("P","M","G");
// debug($entradas);
?>


<br>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Cadastrar Peso A</h3>
    </div>
    <?=$_REQUEST['alert']?>
    <div class="panel-body" >
      <form method="post" action="">
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
        <div class="form-group">
          <label>Peso</label>
          <input class="form-control" required name="peso">
        </div>
        <div class="form-group">
        <label>Porte</label>
        <select name="porte" required class="form-control">
          <?php
          if(!empty($_REQUEST['porte'])){
            echo "<option value='".$porte."'>".$pesagem_a->descPorte($porte)."</option>";
          }
          ?>
          <option value="">Selecione...</option>
          <?php  foreach($portes as $porte): ?>
            <option value="<?=$porte?>"><?=$pesagem_a->descPorte($porte)?></option>
          <?php endforeach;?>
        </select>

       </div>
      <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    <div class="panel panel-default">
      <div class="panel-heading">Listando Pesagem A </div>
      <table class="table table-striped">
        <tr>
          <td>
            <b>ID</b>
          </td>
          <td>
            <b>Entrada/Descrição/Peso</b>
          </td>
          <td>
            <b>Peso</b>
          </td>
          <td>
            <b>Porte</b>
          </td>
          <td>
            <b>Criado</b>
          </td>
          <td>
            <b>Usuário</b>
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
              <?=$lista->getPeso()?>Kg
            </td>
            <td>
            <?=$lista->getPorte()?>
            </td>
            <td>
              <?=$validador->dataTimeStampToFormatoBrasil($lista->getCriado())?>
            </td>
            <td>
              <?=$usuario->getUsuarioUni($lista->getUsuario())->getNome()?>
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
