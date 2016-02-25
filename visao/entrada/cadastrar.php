<?php
$peixeBD = new PeixeBD;
$peixe = new Peixe;
$peixes = $peixeBD->getPeixeTipo("B");
$usuario = new UsuarioBD;
$entradaBD = new EntradaBD;

$validador = new Validador;

 ?>

<br>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Entrada de peixe bruto</h3>
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

        <input type="hidden" name="id" value="<?=$id?>">
        <div class="form-group">
          <label>Peso</label>
          <input class="form-control" required name="peso" type="number" placeholder="Peso em Kg:">
        </div>
        <button type="submit" class="btn btn-default">Cadastrar</button>
      </form>
    </div>
  </div>


<?php
if($_REQUEST['pagina'] != ""){
  $lista = $entradaBD->getEntradaUltimos($_REQUEST['pagina']);
  if($_REQUEST['pagina'] > 0){
    $anterior = "<a href='".DIRETORIO."entrada/cadastrar/pagina/".($_REQUEST['pagina'] - 1)."'><span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span></a>";
  } else {
    $anterior = "";
  }
  $proximo = "<a href='".DIRETORIO."entrada/cadastrar/pagina/".($_REQUEST['pagina'] + 1)."'><span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span></a>";

 ?>
  <div class="panel panel-default">

    <div class="panel-body">
      <div class="panel panel-default">
        <div class="panel-heading">Últimos movimentos cadastrados - página <?=$_REQUEST['pagina'] + 1?>
          <div class="paginacao">
            <?=$anterior?>
            <?=$proximo?>
          </div>

        </div>

         <table class="table table-striped">
          <tr>
            <td>
              <b>ID</b>
            </td>
            <td>
              <b>Peixe</b>
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

          <?php  foreach($lista as $lista): ?>
            <tr>
              <td>
                <?=$lista->getId()?>
              </td>
              <td>
                <?=$peixeBD->getPeixeUni($lista->getPeixe())->getDescricao()?>
              </td>
              <td>
                <?=$lista->getPeso()?>
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
            acho $lista;
          <?php endforeach;?>

        </tr>
      </table>
    </div>
  </div>
</div>
<?php
}
 ?>
