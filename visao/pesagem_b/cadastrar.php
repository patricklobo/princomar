<?php
$pesagem_b = new Pesagem_b;
$pesagem_bBD = new Pesagem_bBD;
$usuario = new UsuarioBD;
$validador = new Validador;
$lotes = new Lote;
$loteBD = new LoteBD;
$lote = $loteBD->getLoteSelectUltimos();
$lista = $pesagem_bBD->getPesagem_b();
$peixeBD = new peixeBD;
//debug($lista);

?>

<br>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Cadastrar Peso B</h3>
    </div>
    <?=$_REQUEST['alert']?>
    <div class="panel-body" >
      <form method="post" action="">
        <div class="form-group">
          <label>Lote</label>
          <select name="lote" required class="form-control">
          <option value="">Selecione</option>
            <?php
            foreach($lote as $objlote):?>
            <option value="<?=$objlote->getId()?>"> <?=$objlote->getId()?> - <?=$peixeBD->getPeixeUni($objlote->getPeixe())->getDescricao()?> </option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label>Peso</label>
          <input class="form-control" required name="peso">
        </div>
        <button type="submit" class="btn btn-default">Cadastrar</button>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-body">
    <div class="panel panel-default">
      <div class="panel-heading">Listando Pesagem B </div>
      <table class="table table-striped">
        <tr>
          <td>
            <b>ID</b>
          </td>
          <td>
            <b>Lote/Descrição</b>
          </td>
          <td>
            <b>Peso</b>
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

        <?php  foreach ($lista as $listas): ?>
          <tr>
            <td>
              <?=$listas->getId()?>
            </td>
            <td>
             <?=$listas->getLote()?> - <?=$peixeBD->getPeixeUni($loteBD->getLoteUni($listas->getLote())->getPeixe())->getDescricao() ?>
            </td>
            <td>
              <?=$listas->getPeso()?>Kg
            </td>
            <td>
              <?=$validador->dataTimeStampToFormatoBrasil($listas->getCriado())?>
            </td>
            <td>
              <?=$usuario->getUsuarioUni($listas->getUsuario())->getNome()?>
            </td>
            <td>
              <a href="<?=DIRETORIO?>usuario/gerenciar/excluir/<?=$listas->getId()?>">
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
