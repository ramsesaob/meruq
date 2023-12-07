    <meta name="viewport" content="width=device-width,initial-scale=1"/>
<!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="pages" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php echo $this->Html->image('q4.png', array('alt' => 'CakePHP'))?>
             
             
            </a>

            <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top" role="navigation">
                 
              
                    
         
                    <ul class="nav navbar-nav">
                       <li class="active " >
                <?= $this->Html->link('<i class="glyphicon glyphicon-home"></i> <span> Inicio</span>', '/', array('escape' => false)); ?></a></li>
                        
                        <li class="dropdown">
                          <a href="#" class="glyphicon glyphicon-list-alt" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                             
                            <li> <?php echo $this->Html->Link('Consultar Existencia', array('controller' => 'bodegapeds', 'action' => 'search2')); ?></li>
                             <li> <?php echo $this->Html->Link('Catologo', array('controller' => 'articulos', 'action' => 'view2')); ?></li>
                             <li> <?php echo $this->Html->Link('Mis Recibos', array('controller' => 'recibopeds', 'action' => 'index')); ?></li>
                             <li> <?php echo $this->Html->Link('Acumulado de Venta', array('controller' => 'reportevts', 'action' => 'index')); ?></li>
                             
                             
                            
                       
                       
                            </ul>
                        </li>

                         <li class="dropdown">
                             <a href="#" class="glyphicon glyphicon-shopping-cart" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li><?php echo $this->Html->Link('Nuevo Pedido', array('controller' => 'articulos', 'action' => 'search')); ?></li>
                                     <li><?php echo $this->Html->Link('Pedido en Curso', array('controller' => 'pedidos', 'action' => 'view')); ?></li>
                                     <li> <?php echo $this->Html->Link('Mis Pedidos', array('controller' => 'ordens', 'action' => 'index')); ?></li>
                                     <li> <?php echo $this->Html->Link('Editar Pedido', array('controller' => 'orden_items', 'action' => 'search')); ?></li>
                                    
                          
                            </ul>

                        </li>
                          <?php $role= $this->Session->read('Auth.User.role');  ?>
                    <?php if ($this->Session->read('Auth.User.role') == 'admin') {
                        
                     ?>
                        <li class="dropdown">
                             <a href="#" class="glyphicon glyphicon-wrench" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li> <?php echo $this->Html->Link('Ususario', array('controller' => 'users', 'action' => 'index')); ?></li>
                                     <li> <?php echo $this->Html->Link('modificar Articulos', array('controller' => 'articulos', 'action' => 'search')); ?></li>
                                     
                                    
                          
                            </ul>

                        </li>
                         <?php } ?>
                    </ul>
               
                          
                     
                                
                                              
                <div class="navbar-right">

                    <ul class="nav navbar-nav">

                        <!-- Messages: style can be found in dropdown.less-->
                       
                        <!-- Tasks: style can be found in dropdown.less -->
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                 <i class="glyphicon glyphicon-user"></i>
                                <?php  echo $this->Session->read('Auth.User.nombre');  ?> 
                                
                                <span> <i class="caret"></i></span>
                            </a>

                            <ul class="dropdown-menu">

                                <!-- User image -->
                                <li class="user-header bg-light-black">
                                     <?= $this->Html->image('avatar3.jpg', array('class' => 'img-circle')); ?>
                                    
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?php echo $this->Html->link('Cerrar sesión', array('controller'=>'users', 'action'=>'logout') , array('class' => 'btn btn-sm btn-danger') ); ?> 
                                    </div>
                                    <div class="pull-right">
                                        
                                    </div>
                                </li>
                            </ul>

                        </li>
                    </ul>
                </div>
                  </div>
            </nav>
            

        </header>
