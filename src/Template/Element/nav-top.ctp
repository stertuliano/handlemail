<nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav"  >

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
                <a href="#"  class="dropdown-toggle" data-toggle="dropdown"  style="width: 200px; text-align: center;">
                    <span class="hidden-xs" ><?=$this->request->session()->read('Auth.User.NameUser')?></span>
                </a>
                <ul class="dropdown-menu" style="max-width: 200px;"  >
                    <!-- Menu Footer-->
                    <li class="user-footer" >
                        <div class="pull-right"   >
                            <a href="<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>" class="btn btn-default btn-flat" >Log Out</a>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- Control Sidebar Toggle Button
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li> -->
        </ul>
    </div>
</nav>