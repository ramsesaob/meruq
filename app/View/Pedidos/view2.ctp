<?php
//debug($pedidos);
?>
<?php
//var_dump($pedidos);
?>


<?php echo $this->Html->script(array('cart.js', 'jquery.animate-colors'), array('inline' => false)); ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'pedidos', 'action' => 'check'))); ?>
<h2><strong>EDITAR ARTICULOS DEL PEDIDO <?php echo $pedido['Pedido']['norden']; ?> </strong></h2>





<hr>

<?php $tabindex = 1; ?>


	
<?php foreach($pedidos as $pedido): ?>
	 

	
	<div class="row" id="row-<?php echo $pedido['Pedido']['id']; ?>">
	   
		<div class="col col-sm-1">
		<strong>	-CODIGO:	</strong><?php echo $pedido['Bodegaped']['CODIGO']; ?>
		</div>

		<div class="col col-sm-4">
			<strong>
			-DESCRIPCION:</strong>	<?php echo $this->Html->link($pedido['Bodegaped']['DESCRIPCION'], array('controller' => 'bodegapeds', 'action' => 'view2', $pedido['Bodegaped']['id'])); ?>
			
		</div>

		<!--<div class="col col-sm-1" id="price-<?php echo $pedido['Pedido']['id']; ?>">
			<strong>-PRECIO ORG:</strong> $<?php echo $pedido['Bodegaped']['VENTA']; ?>

		</div> -->
		<div class="col col-sm-1 " id="price-<?php echo $pedido['Pedido']['id']; ?>">

				    <strong>-PRECIO ORG:</strong>
				    <?php echo number_format($pedido['Bodegaped']['VENTA'], 2, '.', ''); ?>
		    
		</div>
		

		<div class="col col-sm-1 col-xs-3" >
			
    	<strong>CANTIDAD:</strong> <?php echo $this->Form->input($pedido['Pedido']['id'], array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlenght' => 2, 'tabindex' => $tabindex++, 'data-id' => $pedido['Pedido']['id'], 'value' => $pedido['Pedido']['cantidad'])); ?>

		</div>
		
		<br>
		<br>
		<br>
		<div class="col col-sm-1 col-xs-4">
    <strong>-PRECIO DESC:</strong>
    <?php echo $this->Form->input('preciodesc.'.$pedido['Pedido']['id'], array(
		        'div' => false,
		        'class' => 'form-control input-small',
		        'label' => false,
		        'size' => 2,
		    //    'maxlength' => 6,
		        'tabindex' => $tabindex++,
		        'data-id' => $pedido['Pedido']['id'],
		        'value' =>  number_format($pedido['Pedido']['preciodesc'], 3, '.', '')
		    )); ?>
     
	</div>
	<br>
		<br>
		<br>
		<div class="col col-sm-2">
			<strong>	-DECUENTO MAX:	</strong><?php echo $pedido['Bodegaped']['Articulo']['DESCUENTO']; ?>%
		</div>

		<div class="col col-sm-1 text-align: center">
			<strong>	-%:</strong>  	<?php echo $pedido['Pedido']['porcentaje']; ?>
			<div class="btn-group">
			  

			 <button type="button" lavel ="%" data-toggle="dropdown" title="Cambiar % de Articulo">
			    <?php echo __(''); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><H3>

				
					<?php
				echo $this->Html->link("0", array('controller' => 'pedidos', 'action'=>'opc0', $pedido['Pedido']['id'])); 	?>/

				<?php	 
				 echo $this->Html->link("1", array('controller' => 'pedidos', 'action'=>'opc1', $pedido['Pedido']['id'])); ?>/
				<?php	   echo $this->Html->link("2", array('controller' => 'pedidos','action'=>'opc2', $pedido['Pedido']['id'])); ?>/
				<?php	    echo $this->Html->link("3", array('controller' => 'pedidos','action'=>'opc3', $pedido['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("4", array('controller' => 'pedidos','action'=>'opc4', $pedido['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("5", array('controller' => 'pedidos','action'=>'opc5', $pedido['Pedido']['id'])); ?>/
				<?php	      echo $this->Html->link("6", array('controller' => 'pedidos','action'=>'opc6', $pedido['Pedido']['id'])); ?>/
				<?php	       echo $this->Html->link("7", array('controller' => 'pedidos', 'action'=>'opc7', $pedido['Pedido']['id'])); ?>/
				<?php		   echo $this->Html->link("8", array('controller' => 'pedidos','action'=>'opc8', $pedido['Pedido']['id'])); ?>/
				<?php		    echo $this->Html->link("9", array('controller' => 'pedidos','action'=>'opc9', $pedido['Pedido']['id'])); ?>/
				<?php		     echo $this->Html->link("10", array('controller' => 'pedidos','action'=>'opc10', $pedido['Pedido']['id'])); ?>/
				<?php		      echo $this->Html->link("11", array('controller' => 'pedidos','action'=>'opc11', $pedido['Pedido']['id'])); ?>/
				<?php	  echo $this->Html->link("12", array('controller' => 'pedidos', 'action'=>'opc12', $pedido['Pedido']['id'])); ?>/
				<?php	   echo $this->Html->link("13", array('controller' => 'pedidos','action'=>'opc13', $pedido['Pedido']['id'])); ?>/
				<?php	    echo $this->Html->link("14", array('controller' => 'pedidos','action'=>'opc14', $pedido['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("15", array('controller' => 'pedidos','action'=>'opc15', $pedido['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("16", array('controller' => 'pedidos','action'=>'opc16', $pedido['Pedido']['id'])); ?>/
				<?php	      echo $this->Html->link("17", array('controller' => 'pedidos','action'=>'opc17', $pedido['Pedido']['id'])); ?>/
				<?php	       echo $this->Html->link("18", array('controller' => 'pedidos', 'action'=>'opc18', $pedido['Pedido']['id'])); ?>/
				<?php		   echo $this->Html->link("19", array('controller' => 'pedidos','action'=>'opc19', $pedido['Pedido']['id'])); ?>/
				<?php		    echo $this->Html->link("20", array('controller' => 'pedidos','action'=>'opc20', $pedido['Pedido']['id'])); ?>/
				<?php		     echo $this->Html->link("21", array('controller' => 'pedidos','action'=>'opc21', $pedido['Pedido']['id'])); ?>/
				<?php		      echo $this->Html->link("22", array('controller' => 'pedidos','action'=>'opc22', $pedido['Pedido']['id'])); ?>/
				<?php		    echo $this->Html->link("23", array('controller' => 'pedidos','action'=>'opc23', $pedido['Pedido']['id'])); ?>/
				<?php		     echo $this->Html->link("24", array('controller' => 'pedidos','action'=>'opc24', $pedido['Pedido']['id'])); ?>/
				<?php		      echo $this->Html->link("25", array('controller' => 'pedidos','action'=>'opc25', $pedido['Pedido']['id'])); ?>/
					
			
			</H3>

			</li>
				
			  </ul>
			  
			</div>
		</div>

		<div class="col col-sm-2" style="background-color: none;" id= "subtotal_<?php echo $pedido['Pedido']['id']; ?>">
	<strong>-SUBTOTAL: </strong><?php echo number_format($pedido['Pedido']['subtotal'], 2, '.', ''); ?>
		</div>

	

		<div class="col col-sm-2">
			<strong>	-ELIMINAR:	</strong><?php
			echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', '#', array('escapeTitle' => false, 'title' => 'Eliminar item', 'id' => $pedido['Pedido']['id'], 'class' => 'remove'));
			?>
		</div>
	</div>
	<!--<?php echo $this->Form->button('Guardar', array('class' => 'btn btn-primary save', 'escape' => false)); ?> -->
	__________________________________________________
</br>
	<br>

<?php endforeach; ?>

	<hr>

<div class="row">
	<div class="col col-sm-12">
		<div class="pull-right tr">

	
		<button type="button" class="btn btn-link "> <?php echo $this->Html->link(__(' AGREGAR ARTICULO'),array('controller' => 'bodegapeds', 'action' => 'search4')); ?> <li class="glyphicon glyphicon-plus-sign"> </li></button> 
		<?php echo $this->Form->button('check', array('class' => 'btn btn-warning fa fa-dollar fa-1x fa-lg', 'escape' => false, 'name' => 'check', 'value' => 'check')); ?>
		  
		<br>
	
		</div>

	</div>

</div>
 <div class="pull-center tr">
<h3><span class="total">Total Orden:</span></h3>
		<span id="total" class="total">
		<h2>	$ <?php echo $total_pedidos; ?></h2>
		
</span>

</div>

	<div class="pull-right tr">

<?php echo $this->Form->button('<i class="glyphicon glyphicon-arrow-right"></i> Procesar', array('class' => 'btn btn-primary', 'escape' =>false, 'name' => 'procesar', 'value' => 'procesar')); ?>

		<?php echo $this->Form->end(); ?>
</div>
                  

                       
              
                  
                   
            </section>
            