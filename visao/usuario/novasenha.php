<br>


<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Alterar senha</h3>
    </div>
    <?=$_REQUEST['alert']?>
    <div class="panel-body <?=$ativacor?>" >
      <form method="post" action="">
        <input type="hidden" name="id" value="<?=$id?>">
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
</div>
