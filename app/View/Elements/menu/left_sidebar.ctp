<meta name="viewport" content="width=device-width,initial-scale=1"/>
    <div class="table-responsive">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">                
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <div class="user-panel">
                
            <!-- search form -->
            
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
             
                
                
                    <li class="active">
                            <?= $this->Html->link('<i class="fa fa-Home"></i> <span> <b> <h3> <center><FONT FACE="arial" SIZE=5 COLOR="#3c8dbc"> Menu principal </FONT> </center> </b> </h3> </span>', '/', array('escape' => false)); ?>
                    </li>

                    <li class="active">
                            <?= $this->Html->link('<i class="fa fa-Home"></i> <span> <b>  <legend><FONT FACE="arial" SIZE=4 COLOR=" #e8c724"> Listas: </FONT></legend> </b> </span>', '/', array('escape' => false)); ?>
                    </li>

                      
                    <li class="treeview">
                            <a href="#">
                                <i class="fa fa-search"></i>
                                <span>Buscar</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li> <?php echo $this->Html->Link('Articulos por Nombre', array('controller' => 'articulos', 'action' => 'search')); ?></li>
                                 
                            </ul>
                    </li>
                         
            
                
                    <li class="active">
                    <?= $this->Html->link('<i class="fa fa-Home"></i> <span> <b>  <legend><FONT FACE="arial" SIZE=4 COLOR=" #e8c724"> Operaciones: </FONT></legend> </b>  </span>', '/', array('escape' => false)); ?>
                </li>

             


                     <li class="treeview">
                    <a href="#">
                        <i class="  glyphicon glyphicon-folder-close"></i>
                        <span>Pedidos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                       
                        <li><?php echo $this->Html->Link('Ver Pedido ', array('controller' => 'ordens', 'action' => 'add')); ?></li>
                        <li><?php echo $this->Html->Link('Lista de Pedidos ', array('controller' => 'ordens', 'action' => 'index')); ?></li>
                    </ul>

                    
                    <?php $role= $this->Session->read('Auth.User.role');  ?>
                    <?php if ($this->Session->read('Auth.User.role') == 'admin') {
                        
                     ?>
                 </li>
                     <li class="treeview">
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Usuarios</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li> <?php echo $this->Html->Link('Lista de Usuarios', array('controller' => 'users', 'action' => 'index')); ?></li>
                        <li><?php echo $this->Html->Link('Nuevo Usuario', array('controller' => 'users', 'action' => 'add')); ?></li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <!-- /.sidebar -->
</aside>
</div>
