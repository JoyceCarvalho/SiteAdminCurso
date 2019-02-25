<!-- Sidebar menu-->>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name">John Doe</p>
          <p class="app-sidebar__user-designation">Frontend Developer</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item <?=($menu_ativo == "dashboard") ? "active" : ""?>" href="<?=base_url("admin")?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Home</span></a></li>
        <li class="treeview <?=($menu_ativo == "usuarios") ? "is-expanded" : "" ?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Usuários</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?=$submenu_ativo == "u_cad" ? "active" : ""?>" href="<?=base_url("user_insert");?>"><i class="icon fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a class="treeview-item <?=$submenu_ativo == "u_list" ? "active" : ""?>" href="<?=base_url("user_list");?>"><i class="icon fa fa-circle-o"></i> Listar</a></li>
          </ul>
        </li>
        <li class="treeview <?=($menu_ativo == "facilitadores" ? "is-expanded" : "")?>"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Facilitador</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?=($submenu_ativo == "f_cad") ? "active" : ""?>" href="<?=base_url("facilitador_insert");?>"><i class="icon fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a class="treeview-item <?=($submenu_ativo == "f_list") ? "active" : ""?>" href="<?=base_url("facilitador_list");?>"><i class="icon fa fa-circle-o"></i> Listar</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Cursos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?=(isset($submenu_ativo) and ($submenu_ativo == "c_cad") ? "active" : "")?>" href="form-components.html"><i class="icon fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a class="treeview-item <?=(isset($submenu_ativo) and ($submenu_ativo == "c_list") ? "active" : "")?>" href="form-custom.html"><i class="icon fa fa-circle-o"></i> Listar</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-handshake-o "></i><span class="app-menu__label">Parceiros</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?=(isset($submenu_ativo) and ($submenu_ativo == "p_cad") ? "active" : "")?>" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a class="treeview-item <?=(isset($submenu_ativo) and ($submenu_ativo == "p_list") ? "active" : "")?>" href="table-data-table.html"><i class="icon fa fa-circle-o"></i> Listar</a></li>
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-id-card-o"></i><span class="app-menu__label">Inscrições</span><i class="treeeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item <?=(isset($submenu_ativo) and ($submenu_ativo == "i_cad") ? "active" : "")?>" href="<?=base_url()?>"><i class="icon fa fa-circle-o"></i> Cadastrar</a></li>
            <li><a class="treeview-item <?=(isset($submenu_ativo) and ($submenu_ativo == "i_list") ? "active" : "")?>" href="<?=base_url()?>"><i class="icon fa fa-circle-o"></i> Listar</a></li>
          </ul>
        </li>
      </ul>
    </aside>