<div class="users index">
	<h2><?php echo __('Lista de Usuarios'); ?></h2>
	<div class="table-responsive">
	<table class="table table-bordered text-center">
	<thead>
	<tr>
			
			<th><?php echo $this->Paginator->sort('username', 'Nombre de Usuario'); ?></th>
			
			<th><?php echo $this->Paginator->sort('role', 'Tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('Estado'); ?></th>
			<th><?php echo $this->Paginator->sort('Nombre');?></th>
			
			
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		
		<td style="text-align: center;"><?php echo h($user['User']['username']); ?>&nbsp;</td>

	
		<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
		<!--
		<td><?php echo date("d-m-Y H:s", strtotime($user['User']['created'])); ?>&nbsp;</td>
		<td><?php echo date("d-m-Y H:s", strtotime($user['User']['modified'])); ?>&nbsp;</td>
		-->
		<td style="text-align: center;">
			<?php 
			if($user['User']['status']==1) {
				echo '<i class="btn btn-success btn-circle glyphicon glyphicon-ok"></i>';
			} else { 
				echo '<i class="btn btn-danger btn-circle glyphicon glyphicon-remove"></i>';
			} ?>
		</td>
		<td style="text-align: center;"><?php echo h($user['User']['nombre']); ?>&nbsp;</td>
		
		
		<!--<td>
			<?php echo $this->Html->link($user['Auditor']['nombre_auditor'], array('controller' => 'areacontrols', 'action' => 'view', $user['Auditor']['id'])); ?>
		</td>-->


		<td class="actions   ">
			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle glyphicon glyphicon-asterisk" data-toggle="dropdown" title="Acciones">
			    <span class="caret"></span>
			  </button> 
			  <ul class="dropdown-menu" role="menu">
				<li><?php echo $this->Html->link('Ver Datos',  array('action' => 'view3', $user['User']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'ver')); ?></li>
				<li><?php echo $this->Html->link('Cambiar Datos',  array('action' => 'edit', $user['User']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'editar')); ?></li>
				<li><?php echo $this->Html->link('Cambiar Contraseña',  array('action' => 'edit2', $user['User']['id']), array('class'    => 'tip', 'escape'   => false, 'title' => 'editar')); ?></li>
				<li><?php echo $this->Form->postLink('Eliminar Usuario', array('action' => 'delete', $user['User']['id']), array('confirm' => __('Esta seguro que desea borrar este Usuario?', $user['User']['id']), 'class'    => 'tip', 'escape'   => false, 'title' => 'borrar')); ?></li>
			  </ul>
			</div>

			<div class="btn-group">
			  <button type="button" class="btn btn-default dropdown-toggle glyphicon glyphicon-lock" data-toggle="dropdown" title="Cambiar Estatus de Usuario">
			    <?php echo __(''); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><?php
				if( $user['User']['status'] != 0){ 
				 	echo $this->Html->link("Desactivar Usuario", array('action'=>'desactivar', $user['User']['id']), array('confirm' => __('Esta seguro que desea desactivar el Usuario?', $user['User']['id'])));}

					else{
					  echo $this->Html->link("Activar Usuario", array('action'=>'activate', $user['User']['id'])); 
					}
			?></li>
				
			  </ul>
			</div>
		</td>
</div>

			


		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>

<?php echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}, muestra {:current} de un total de {:count}, comienza en el registro {:start} y finaliza en el registro {:end}')));?>	</p>
	
	<table class="table table-condensed text-center">
		<thead>
			<td>
    			<ul class="pagination " align="center">
		            <?php
		                echo $this->Paginator->prev(__('ant'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		                echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
		                echo $this->Paginator->next(__('sig'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		            ?>
        		</ul>
        	</td>
         </thead>
     </table>

</div>
<div class="Registar Usuario">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Usuario'), array('action' => 'add')); ?></li>
		
	</ul>

	
</div>
