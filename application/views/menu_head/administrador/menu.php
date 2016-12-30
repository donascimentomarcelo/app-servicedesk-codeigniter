<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <span class="mdl-layout-title">Menu</span>
        <!-- Add spacer, to align navigation to the right -->
        <div class="mdl-layout-spacer"></div>
        <!-- Navigation. We hide it in small screens. -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">
            <a href="/cd/index.php/login/login_controller/sair" class="btn-off"><i class="material-icons">power_settings_new</i> </a>
        </nav>
    </div>
</header>
<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">Opções</span>
    <nav class="mdl-navigation">
        <!-- Left aligned menu below button -->
        <nav class="mdl-navigation">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth layout-dropdown">
                <div class="mdl-textfield__input" type="text" id="opcService"  readonly tabIndex="-1">
                    <div style="text-align: center;">Opções de Chamado</div>
                    <ul for="opcService" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/chamado/chamado_controller/abrir_chamado';">Abrir Chamado</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/chamado/chamado_controller/meus_chamados';">Meus Chamados</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/chamado/chamado_controller/listar_chamado';">Atender Chamado</li>
                    </ul>
                </div>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth layout-dropdown">
                <div class="mdl-textfield__input" type="text" id="opcUser"  readonly tabIndex="-1">
                    <div style="text-align: center;">Usuário</div>
                    <ul for="opcUser" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/perfil_pessoal/perfil_pessoal_controller/alterar_perfil';">Config. de Perfil</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/perfil_pessoal/perfil_pessoal_controller/alter_photo';">Alterar Foto</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/usuario/usuario_controller/listar_usuario';">Config. de Usuário</li>
                    </ul>
                </div>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth layout-dropdown">
                <div class="mdl-textfield__input" type="text" id="menuConfig"  readonly tabIndex="-1">
                    <div style="text-align: center;">Configuração</div>
                    <ul for="menuConfig" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/setor/setor_controller/listar_setor';">Setor</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/categoria/categoria_controller/exibir_categoria';">Categoria</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/subcategoria/subcategoria_controller/exibir_subcategoria';">Subcategoria</li>
                    </ul>
                </div>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth layout-dropdown">
                <div class="mdl-textfield__input" type="text" id="menuInvetary"  readonly tabIndex="-1">
                    <div style="text-align: center;">Inventário</div>
                    <ul for="menuInvetary" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/inventario/inventario_controller/hardware_list';"> Hardware</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/inventario/inventario_controller/software_list';"> Software</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/inventario/inventario_controller/configuracao_inventario_list';"> Configuração</li>
                    </ul>
                </div>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fullwidth layout-dropdown">
                <div class="mdl-textfield__input" type="text" id="indicators"  readonly tabIndex="-1">
                    <div style="text-align: center;">Indicadores</div>
                    <ul for="indicators" class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/indicadores/indicadores_controller/localizador';"> Localizador de Chamados</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/indicadores/indicadores_controller/indicadores';">Chamado x Data</li>
                        <li class="mdl-menu__item" onclick="location.href='/cd/index.php/indicadores/indicadores_controller/chamado_tecnico';">Chamado x Técnico</li>
                    </ul>
                </div>
            </div>
        </nav>

        <a href="/cd/index.php/login/login_controller/sair" style="margin-left: auto; margin-right: auto"><i class="material-icons">power_settings_new</i></a>
    </nav>
</div>