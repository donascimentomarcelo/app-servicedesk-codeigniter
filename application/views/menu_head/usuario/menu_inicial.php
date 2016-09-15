<div id="body">
    <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="http://localhost/cd/index.php/perfil/p_usuario">Início</a>
            </div>
            <ul class="nav navbar-nav">
             <li><?php echo anchor('cd/cd_controller/listar_cd', 'Manter CD'); ?></li>
              <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#"> Configurações
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="http://localhost/cd/index.php/perfil_pessoal/perfil_pessoal_controller/alterar_perfil" class="glyphicon glyphicon-cog"> Configuração de Perfil</a></li>
                    <li><a href="#" class="glyphicon glyphicon-cog"> Setor C</a></li>
                </ul>
              </li>
             <li><a href="http://localhost/cd/index.php/login/login_controller/sair"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
            </ul>
          </div>
        </nav>
 </div>