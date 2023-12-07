<div class="container">
	<div class="row">
		<div class="col-md-6">
			<?php echo $this->Form->create('Cliente', array('role' => 'form')); ?>
				<fieldset>
					<legend><?php echo __('Add Cliente'); ?></legend>
				<?php
					echo $this->Form->input('rif', array('class' => 'form-control', 'label' => 'rif'));
					echo $this->Form->input('nombre', array('class' => 'form-control', 'label' => 'nombre'));
					echo $this->Form->input('direcion', array('class' => 'form-control', 'label' => 'direccion'));
					
				?>
				</fieldset>
				<p>
				<?php echo $this->Form->end(array('label' => 'Crear Mesa', 'class' =>'btn btn-success')); ?>
				</p>
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
			    <?php echo __('Actions'); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link(__('List Mesas'), array('action' => 'index')); ?></li>
			    <li class="divider"></li>
				<li><?php echo $this->Html->link(__('List Meseros'), array('controller' => 'meseros', 'action' => 'index')); ?></li>
				<li><?php echo $this->Html->link(__('New Mesero'), array('controller' => 'meseros', 'action' => 'add')); ?></li>
			  </ul>
			</div>
		</div>
	</div>
</div>


