<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">Início</a></li>
        <!-- <li><a href="#">Link</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Peixes
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?=DIRETORIO?>peixe/gerenciar">Gerenciar</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Usuários
            <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="<?=DIRETORIO?>usuario/gerenciar">Gerenciar</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <?=$_REQUEST['usuariologado']['nome']?>
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?=DIRETORIO?>usuario/novasenha">Mudar senha</a></li>
            <li><a href="#">Minhas informações</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?=DIRETORIO?>usuario/sair">
              <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
              Sair</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
