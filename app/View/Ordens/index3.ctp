<?php
//debug($ordens);
?>

<?php echo $this->Html->script( array('app.js'), array('inline' => false) ); ?>  


<?php if(empty($ordens)): ?>

<h2>No existen ordenes disponibles</h2>

<?php else: ?>

	

	<div class="ordens form">






	<div class="col-md-12">
			<h2><?php echo __('Seleccione la Orden Modificada'); ?></h2>
	
		
			<table id="tabla" class="table table-striped text-center">
		
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('Nº DE ORDEN'); ?></th>
				<th><?php echo $this->Paginator->sort('Nombre Cliente'); ?></th>
				
			
				<th><?php echo $this->Paginator->sort('Creado'); ?></th>
			
				<th class="actions"><?php echo __('Ver'); ?></th>
		</tr>
		</thead>
		<input id="buscar" type="text" class="form-control" placeholder="Escriba algo para filtrar" />
		<tbody>

        <?php foreach($ordens as $orden): ?>
		
		<tr>
			<td><?php echo h($orden['Orden']['numpedido']); ?></td>
			<td><?php echo h($orden['Cliente']['DESCRIPCION']); ?></td>
		
			

			<td><?php echo $this->Time->format('d-m-Y h:i A', h($orden['Orden']['created'])); ?></td>
			
			<td class="actions">
				
				
				<?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></button>',  array('action' => 'edit', $orden['Orden']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'editar')); ?>

               
			</td>
		</tr>
        <?php endforeach; ?>
		
		</tbody>
		</table>
	</div>

	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-ordens -->

<?php endif; ?>
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