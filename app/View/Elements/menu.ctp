<div class="navbar-wrapper">
      

        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Dirección</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><?php echo $this->Html->Link('Inicio',array('controller' => 'pages', 'action' => 'display', 'home'));?></li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estudiantes <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li> <?php echo $this->Html->Link('Lista de Estudiantes', array('controller' => 'estudiantes', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->Link('Nuevo Estudiante', array('controller' => 'estudiantes', 'action' => 'add')); ?></li>
                    <li class="divider"></li>
                <li class="dropdown-header">Inscripciones</li>
                <li class="divider"></li>
                <li> <?php echo $this->Html->Link('Lista de inscritos', array('controller' => 'inscripciones', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->Link('Nueva Inscripción', array('controller' => 'inscripciones', 'action' => 'add')); ?></li>
                <li class="divider"></li>
                <li class="dropdown-header">Registro de pagos</li>
                <li class="divider"></li>
                <li><?php echo $this->Html->Link('Lista de Pagos', array('controller' => 'pagos', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->Link('Nuevo Pago', array('controller' => 'pagos', 'action' => 'add')); ?></li></li>
                  </ul>
                </li>


                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Representantes <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li> <?php echo $this->Html->Link('Lista de Representantes', array('controller' => 'representantes', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->Link('Nuevo Representante', array('controller' => 'representantes', 'action' => 'add')); ?></li>
                  </ul>
                </li>

            <li class="dropdown">
               <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Docente <span class="caret"></span></a>
              <ul class="dropdown-menu">
               <li> <?php echo $this->Html->Link('Lista de Docentes', array('controller' => 'docentes', 'action' => 'index')); ?></li>
              <li><?php echo $this->Html->Link('Nuevo Docente', array('controller' => 'docentes', 'action' => 'add')); ?></li>
              <li class="divider"></li>
                <li class="dropdown-header">Carga de notas</li>
                <li class="divider"></li>
                <li> <?php echo $this->Html->Link('Lista de Notas', array('controller' => 'notas', 'action' => 'index')); ?></li>
                <li><?php echo $this->Html->Link('Nueva Nota', array('controller' => 'notas', 'action' => 'add')); ?></li>
            </li>
          </ul>

          

                 <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Materias <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li> <?php echo $this->Html->Link('Lista de Materias', array('controller' => 'materias', 'action' => 'index')); ?></li>
                    <li><?php echo $this->Html->Link('Nueva Materia', array('controller' => 'materias', 'action' => 'add')); ?></li>
                </li>
              </ul>



            </div>
          </div>
        </nav>

      </div>
  