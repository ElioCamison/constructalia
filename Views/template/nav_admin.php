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
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>user" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>rol"><i class="icon fa fa-circle-o"></i> Roles</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>user"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
<!--                <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>-->
<!--                <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>-->
<!--                <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>-->
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
                <li><a class="treeview-item" href="<?= base_url(); ?>category"><i class="icon fa fa-circle-o"></i> Categoría</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>training"><i class="icon fa fa-circle-o"></i> Formación</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="<?= base_url(); ?>machinery" data-toggle="treeview">
                <i class="app-menu__icon fa fa-laptop"></i>
                <span class="app-menu__label">Maquinaria</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>machinery"><i class="icon fa fa-circle-o"></i> Maquinaria</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>outsource"><i class="icon fa fa-circle-o"></i> Familia</a></li>
            </ul>
        </li>
        <li><a class="app-menu__item" href="docs.html"><i class="app-menu__icon fa fa-file-code-o"></i><span class="app-menu__label">Docs</span></a></li>
    </ul>
</aside>