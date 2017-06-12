<ul class="sidebar-menu">
    <li class="treeview <?php echo $this->Menu->getIsActive('Home'); ?>">
        <a href="#">
            <i class="fa fa-home"></i><span>Home</span>
        </a>
    </li>
    <li class="treeview <?php echo $this->Menu->getIsActive('Users'); ?>">
        <a href="#">
            <i class="fa fa-user"></i><span>Usuários</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo $this->Menu->getIsActive('Users', 'add'); ?>">
            	<a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'add']); ?>"><i class="fa fa-plus"></i> Adicionar</a>
            </li>
            <li class="<?php echo $this->Menu->getIsActive('Users', 'index'); ?>">
            	<a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>"><i class="fa fa-list"></i> Listar</a>
            </li>
        </ul>
    </li>
    <li class="treeview <?php echo $this->Menu->getIsActive('Accounts'); ?>">
        <a href="#">
            <i class="fa fa-tag"></i><span>Contas</span><i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo $this->Menu->getIsActive('Accounts', 'add'); ?>">
            	<a href="<?php echo $this->Url->build(['controller' => 'Accounts', 'action' => 'add']); ?>"><i class="fa fa-plus"></i> Adicionar</a>
            </li>
            <li class="<?php echo $this->Menu->getIsActive('Accounts', 'index'); ?>">
            	<a href="<?php echo $this->Url->build(['controller' => 'Accounts', 'action' => 'index']); ?>"><i class="fa fa-list"></i> Listar</a>
            </li>
        </ul>
    </li>
</ul>