<?php
//debug($ordens);
?>




<?php if(empty($recibopeds)): ?>

<h2>No existen ordenes disponibles</h2>

<?php else: ?>

	

	<div class="recibopeds form">






	<div class="col-md-12">
			<h2><?php echo __('MIS RECIBOS'); ?></h2>
	
		

		<table class="table table-striped text-center">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('Nº DE RECIBO'); ?></th>
				<th><?php echo $this->Paginator->sort('Nombre Cliente'); ?></th>
				
				<th><?php echo $this->Paginator->sort('Total'); ?> $</th>
				<th><?php echo $this->Paginator->sort('Creado'); ?></th>
			
				<th class="actions"><?php echo __('Ver'); ?></th>
		</tr>
		</thead>
		<tbody>

        <?php foreach($recibopeds as $reciboped): ?>
		
		<tr>
			<td><?php echo h($reciboped['Reciboped']['id']); ?></td>
			<td><?php echo h($reciboped['Cliente']['DESCRIPCION']); ?></td>
		
			<td>
				<?php echo number_format($reciboped['Reciboped']['monto'], 2, '.', ''); ?>
			</td>

			<td><?php echo $this->Time->format('d-m-Y h:i A', h($reciboped['Reciboped']['created'])); ?></td>
			
			<td class="actions">
				
				<?php 
				    echo $this->Html->link('', array('controller' => 'recibopeds', 'action' => 'view', $reciboped['Reciboped']['id']), array('class' => 'glyphicon glyphicon-search'));
				?>
				<!--<?php echo $this->Html->link('<button class="btn btn-success btn-xs"><i class="glyphicon glyphicon-pencil"></i></button>',  array('action' => 'edit', $reciboped['Reciboped']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'editar')); ?>-->

               
			</td>
		</tr>
        <?php endforeach; ?>
		
		</tbody>
		</table>
	</div>

		<p>
		 <?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, muestra {:current} de un total de {:count}, comienza en el registro {:start} y finaliza en el registro {:end}')));?>	</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-ordens -->

<?php endif; ?>