<?php
// debug($pedidos);
?>

<?php echo $this->Html->script(array('cart.js', 'jquery.animate-colors'), array('inline' => false)); ?>

 <?php echo $this->Form->create('Pedido', array('role'=> 'form')); ?>
<h1>Pedidos de <?php  echo $this->Session->read('Auth.User.nombre');  ?></h1>
<div><?PHP echo $this->Form->input('cliente_id', array('class' => 'form-control', 'label' => 'Seleccione el Cliente', 'empty' => '(seleccione)')); ?>
	<?PHP echo $this->Form->input('user_id', array('type' => 'hidden'));?>
</div>

<hr>
<div class="row">
	<div class="col col-sm-1">CODIGO</div>
	<div class="col col-sm-7">DESCRIPCION</div>
	<div class="col col-sm-1">PRECIO</div>
	<div class="col col-sm-1">CANTIDAD</div>
	<div class="col col-sm-1">SUBTOTAL</div>
	<div class="col col-sm-1">ELIMINAR</div>
</div>

<?php $tabindex = 1; ?>

<?php foreach($orden_item as $item): ?>

	<div class="row" id="row-<?php echo $item['Pedido']['id']; ?>">
	    
		<div class="col col-sm-1">
			<figure>
				<?php echo $this->Html->link($item['Articulo']['ARTICULO'], array('controller' => 'articulos', 'action' => 'view', $item['Pedido']['articulo_id'])); ?>
			</figure>
		</div>

		<div class="col col-sm-7">
			<strong>
				<?php echo $this->Html->link($item['Articulo']['DESCRIPCION'], array('controller' => 'articulos', 'action' => 'view', $item['Pedido']['articulo_id'])); ?>
			</strong>
		</div>

		<div class="col col-sm-1" id="price-<?php echo $item['Pedido']['id']; ?>">
			<?php echo $item['Articulo']['VENTA']; ?>
		</div>

		<div class="col col-sm-1">
			<?php echo $this->Form->input($item['Pedido']['id'], array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlenght' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['Pedido']['id'], 'value' => $item['Pedido']['cantidad'])); ?>
		</div>

		<div class="col col-sm-1" style="background-color: none;" id="subtotal_<?php echo $item['Pedido']['id']; ?>">
			<?php echo $item['Pedido']['subtotal']; ?>
		</div>

		<div class="col col-sm-1">
			<?php
			echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', '#', array('escapeTitle' => false, 'title' => 'Eliminar item', 'id' => $item['Pedido']['id'], 'class' => 'remove'));
			?>
		</div>
	</div>
	<br />

<?php endforeach; ?>
<hr>

<div class="row">
	<div class="col col-sm-12">
		<div class="pull-right tr">

		<!--<?php echo $this->Html->link('Quitar pedidos', array('controller' => 'pedidos', 'action' => 'quitar'), array('class' => 'btn btn-danger', 'confirm' => 'Está seguro de quitar todos los pedidos?')); ?>-->
		
		&nbsp;&nbsp;

		<!--<?php echo $this->Form->button('Recalcular', array('class' => 'btn btn-default', 'escape' => false, 'name' => 'recalcular', 'value' => 'recalcular')); ?>-->

		<br><br><br><br>
		<span class="total">Total Orden:</span>
				<span id="total" class="total">
					$ <?php echo $mostrar_total_pedidos; ?>
				</span>
				 <?php echo $this->Form->input('total',array('type' => 'hidden', 'value' => $mostrar_total_pedidos)); ?>
               

		<br><br>
		
		 <?php echo $this->Form->end(array('label' => 'Procesar Orden', 'class' => 'btn btn-success')); ?>

		</div>
	</div>
</div>