<?php echo $this->Html->script( array('app.js'), array('inline' => false) ); ?>  
<div class="container-fluid">
<div class="row">
  <div class="col-xs-12">
    
    
    <!-- TABLA INICIA -->
    <table id="tabla" class="table table-striped">
      <thead>
        <tr>
        
                <th><?php echo $this->Paginator->sort('foto'); ?></th>
                <th><?php echo $this->Paginator->sort('DESCRIPCION'); ?></th>
                <th><?php echo $this->Paginator->sort('PRECIO'); ?></th> 
                <th><?php echo $this->Paginator->sort('PROMOCIÒN'); ?></th> 
              
        </tr>
        <tr>
          <td colspan="4">
            <input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
          </td>
        </tr>
      </thead>
      <tbody>
       <?php foreach ($articulos as $articulo): ?>
            <tr>
               
               
                <td>
                        <?php echo $this->Html->image('../files/articulo/foto/' . $articulo['Articulo']['foto_dir'] . '/' . 'thumb_' .$articulo['Articulo']['foto'], array('url' => array('controller' => 'articulos', 'action' => 'view', $articulo['Articulo']['id']))); ?>
                </td>
                 
                <td><?php echo $this->Html->link($articulo['Articulo']['DESCRIPCION'], array('controller' => 'articulos', 'action' => 'view', $articulo['Articulo']['id'])); ?>&nbsp;</td>
                 <td><?php echo h($articulo['Articulo']['VENTA']); ?>&nbsp;</td>
                  <td>
                    <?php 
      if($articulo['Articulo']['PROM']==1) {
        echo '<i class="btn btn-danger btn-circle glyphicon glyphicon-bullhorn"></i>';
      /**  echo $this->Html->image('promo.png', array('alt' => 'CakePHP', 'class' => 'img-rounded'));*/
      }  ?>
                  </td>
            </tr>
            <?php endforeach; ?>
      </tbody>
    </table>
    <!-- TABLA FINALIZA -->
    
    
  </div>
</div>
</div>
<script type="text/javascript">
     var busqueda = document.getElementById('buscar');
    var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=0;
      while(row = table.rows[r++])
      {
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
          row.style.display = null;
        else
          row.style.display = 'none';
      }
    }

    busqueda.addEventListener('keyup', buscaTabla);
</script>
