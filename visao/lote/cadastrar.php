<?php
$lote = new Lote;
$loteBD = new LoteBD;
$usuario = new usuarioBD;
$peixeBD = new peixeBD;
$peixe = new peixe;
$validador = new Validador;

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
        <input class="form-control" required name="peixe">
      </div>
        <div class="form-group">
          <label>Data de validade</label>
          <input class="form-control"required name="validade" value=<?$validade?>>
        </div>

        <button type="submit" class="btn btn-default">Cadastrar</button>
      </form>
    </div>
  </div>

  <div class="panel panel-default">

    <div class="panel-body">
      <div class="panel panel-default">
        <div class="panel-heading">Lotes cadastrados </div>
         <table class="table table-striped">
          <tr>
            <td>
              <b>ID</b>
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
              <b>Usuário</b>
            </td>
            <td>

            </td>
          </tr>

          <?php  foreach($lista as $lista): ?>
            <tr>
              <td>
                <?=$lista->getId()?>
              </td>
              <td>
                <?=$peixeBD->getPeixeUni($lista->getPeixe())->getDescricao()?>
              </td>
              <td>
                <?=$lista->getvalidade()?>
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
