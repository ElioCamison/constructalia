<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media(); ?>/images/avatar.png" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">John Locke</p>
            <p class="app-sidebar__user-designation">Dharma</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>buildingSite">
                <i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Obras</span>
            </a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>user" data-toggle="treeview">
                <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>rol"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>user"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>user" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">Personal</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>staff"><i class="icon fa fa-circle-o"></i> Propio</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>outsource"><i class="icon fa fa-circle-o"></i> Subcontrata</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>outsourced"><i class="icon fa fa-circle-o"></i> Subcontratado</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>category"><i class="icon fa fa-circle-o"></i> Categor??a</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>training"><i class="icon fa fa-circle-o"></i> Formaci??n</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>machinery" data-toggle="treeview">
                <i class="fa fa-industry" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                <span class="app-menu__label">Maquinaria</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>machinery"><i class="icon fa fa-circle-o"></i> Maquinaria</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>machineryFamily"><i class="icon fa fa-circle-o"></i> Familia</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>ordering" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">Pedidos</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>ordering"><i class="icon fa fa-circle-o"></i> Pedidos</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>supplier"><i class="icon fa fa-circle-o"></i> Proveedores</a></li>
            </ul>
        </li>
    </ul>
</aside>