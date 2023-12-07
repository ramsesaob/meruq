<?php
   $this->Paginator->options(array(
      'update' => '#contenedor-ordens',
      'before' => $this->Js->get("#procesando")->effect('fadeIn', array('buffer' => false)),
      'complete' => $this->Js->get("#procesando")->effect('fadeOut', array('buffer' => false))
   ));
?>
<section class="content-header"> 
                  
		<ol class="breadcrumb text-right">
                       
       <div class="pull-left tr">
         <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'ordens', 'action' => 'index')); ?>
          </div> 
        </div>
		 </ol>       
  </section>

<div id="contenedor-ordens">

<div class="page-header">

	

</div>

	<div class="col-md-12">

	


		<table class="table table-striped">
		<thead>
		<tr>
				<th><?php echo $this->Paginator->sort('Numero de orden'); ?></th>
				<th><?php echo $this->Paginator->sort('Articulo'); ?></th>
				<th><?php echo $this->Paginator->sort('Cantidad'); ?></th>
				<th><?php echo $this->Paginator->sort('Subtotal'); ?> $</th>
		</tr>
		</thead>
		<tbody>
        <?php foreach($ordenitems as $ordenitem): ?>
		<tr>
			<td><?php echo h($ordenitem['Orden']['id']); ?></td>
			<td><?php echo h($ordenitem['Articulo']['DESCRIPCION']); ?></td>
			<td><?php echo h($ordenitem['OrdenItem']['cantidad']); ?></td>
			
			<td>	<?php echo number_format($ordenitem['OrdenItem']['subtotal'], 2, '.', ''); ?></td>
			</td>
		</tr>
        <?php endforeach; ?>
		</tbody>
		</table>

	</div>

		<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
		));
		?>	</p>
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	<?php echo $this->Js->writeBuffer(); ?>
</div> <!-- contenedor-ordens -->