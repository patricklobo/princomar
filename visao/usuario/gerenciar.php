<?php
$usuarioBD = new UsuarioBD;
$lista = $usuarioBD->getUsuario();
$validador = new validador;
$usuario = new Usuario;
$nivels = array(1,3,9);
if(!empty($_REQUEST['usuario'])){
  $ativacor = "form-editando";
  $id= $_REQUEST['usuario']->getId();
  $nome = $_REQUEST['usuario']->getNome();
  $nomeuser = $_REQUEST['usuario']->getNomeuser();
  $nivel = $_REQUEST['usuario']->getNivel();
  $titulo = "Editando usuário $nomeuser";
  $obrigatorio = "";
} else {
  $titulo = "Cadastrar usuário";
  $ativacor = "";
  $obrigatorio = "required";
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
          <label>Nome</label>
          <input class="form-control" required name="nome" value="<?=$nome?>" placeholder="Nome">
        </div>
        <div class="form-group">
          <label>Nome de usuário</label>
          <input class="form-control" name="nomeuser" value="<?=$nomeuser?>" required  placeholder="Nome de usuário">
        </div>
        <div class="form-group">
          <label>Nivel</label>
          <select name="nivel" required class="form-control">
            <?php
            if(!empty($_REQUEST['usuario'])){
              echo "<option value='".$nivel."'>".$usuario->descNivel($nivel)."</option>";
            }
            ?>
            <option value="">Selecione...</option>
            <?php  foreach($nivels as $nivel): ?>
              <option value="<?=$nivel?>"><?=$usuario->descNivel($nivel)?></option>
            <?php endforeach;?>
          </select>
        </div>
        <div class="form-group">
          <label>Senha</label>
          <input class="form-control" <?=$obrigatorio?> name="senha" type="password"  placeholder="Senha">
        </div>
        <div class="form-group">
          <label>Senha novamente</label>
          <input class="form-control" <?=$obrigatorio?> name="senha2" type="password" placeholder="Repita a senha">
        </div>
        <button type="submit" class="btn btn-default">Salvar</button>
      </form>
    </div>
  </div>



  <div class="panel panel-default">
    <div class="panel-body">
      <div class="panel panel-default">
        <div class="panel-heading">Listando Usuários</div>
        <table class="table table-striped">
          <tr>
            <td>
              <b>ID</b>
            </td>
            <td>
              <b>Nome</b>
            </td>
            <td>
              <b>Nome de Usuário</b>
            </td>
            <td>
              <b>Nivel</b>
            </td>
            <td>
              <b>Criado</b>
            </td>
            <td>
              <b>Alterado</b>
            </td>
            <td>

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
                <?=$lista->getNome()?>
              </td>
              <td>
                <?=$lista->getNomeuser()?>
              </td>
              <td>
                <?=$usuario->descNivel($lista->getNivel())?>
              </td>
              <td>
                <?=$validador->dataTimeStampToFormatoBrasil($lista->getCriado())?>
              </td>
              <td>
                <?=$validador->dataTimeStampToFormatoBrasil($lista->getAlterado())?>
              </td>
              <td>
                 <a href="<?=DIRETORIO?>usuario/gerenciar/editar/<?=$lista->getId()?>">
                  <span class="icon-editar glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>

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
