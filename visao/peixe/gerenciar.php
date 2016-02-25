<?php
$peixeBD = new PeixeBD;
$lista = $peixeBD->getPeixe();
$validador = new validador;
$peixe = new Peixe;
$tipos = array("B","P");
if(!empty($_REQUEST['peixe'])){
  $ativacor = "form-editando";
  $id= $_REQUEST['peixe']->getId();
  $descricao = $_REQUEST['peixe']->getDescricao();
  $tipo = $_REQUEST['peixe']->getTipo();
  $titulo = "Editando peixe $descricao";
} else {
  $titulo = "Cadastrar peixe";
  $ativacor = "";
}

?>
<br>


<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><?=$titulo?></h3>
    </div>
    <?=$_REQUEST['alert']?>
    <div class="panel-body <?=$ativacor?>" >
       <form method="post" action="">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="form-group">
          <label>Descricao</label>
          <input class="form-control" required name="descricao" value="<?=$descricao?>" placeholder="Descricao">
        </div>
        <div class="form-group">
          <label>Tipo</label>
          <select name="tipo" required class="form-control">
            <?php
            if(!empty($_REQUEST['peixe'])){
              echo "<option value='".$tipo."'>".$peixe->descTipo($tipo)."</option>";
            }
            ?>
            <option value="">Selecione...</option>
            <?php  foreach($tipos as $tipop): ?>
              <option value="<?=$tipop?>"><?=$peixe->descTipo($tipop)?></option>
            <?php endforeach;?>
          </select>
        </div>
        <button type="submit" class="btn btn-default">Salvar</button>
      </form>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-body">
      <div class="panel panel-default">
        <div class="panel-heading">Listando peixes cadastrados</div>
        <table class="table table-striped">
          <tr>
            <td>
              <b>ID</b>
            </td>
            <td>
              <b>Descrição</b>
            </td>
            <td>
              <b>Tipo</b>
            </td>
            <td>

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
                <?=$lista->getDescricao()?>
              </td>
              <td>
                <?=$peixe->descTipo($lista->getTipo())?>
              </td>
              <td>
                <a href="<?=DIRETORIO?>peixe/gerenciar/editar/<?=$lista->getId()?>">
                  <span class="icon-editar glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

              </td>
              <td>
                <a href="<?=DIRETORIO?>peixe/gerenciar/excluir/<?=$lista->getId()?>">
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
