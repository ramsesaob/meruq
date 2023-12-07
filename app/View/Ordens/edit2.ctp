<?php
 //debug($ordenitems);
?>

<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

-->

<?php echo $this->Form->create('Orden'); ?> 
     
	<section class="content-header"> 
                  
		<ol class="breadcrumb text-right">
                       
       <div class="pull-left tr">
         <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'ordens', 'action' => 'index3')); ?>
          </div> 
        </div>
		 </ol>       
  </section>

			<div>
     
     </div>
	
<br>
 <table class="table  text-center">
  
		   
		   <TR>
				<td> <h4><em><strong><?php echo __('Datos del Pedido Nº'); ?> <?php echo h($orden['Orden']['id']); ?></strong></em></h4></td> 
			</TR>
			<tr><td><h4> <strong>Cliente: </strong><?php echo h($orden['Cliente']['DESCRIPCION']); ?> </h4></td> </tr> 
	</table>
<section class="content-header">
		
			<div class="ordens form">
		<form>
			
								<?PHP echo $this->Form->input('id'); ?>
							<?PHP echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Vendedor', 'type' => 'hidden')); ?>
							
									<?PHP echo $this->Form->input('cliente_id', array('class' => 'form-control', 'label' => 'Vendedor', 'type' => 'hidden')); ?>
				 <?PHP echo $this->Form->input('codigo_id', array('class' => 'form-control', 'label' => 'Formas de pago', 'empty' => '(seleccione)')); ?> 
				 <?php echo $this->Form->input('transporte', array('class' => 'form-control', 'empty' => '(seleccione)',
					                        'type' => 'select',
					                      //  'multiple' => 'true',
					                         'label'=>array('text' => 'Tipo de transporte'),
					                            'options' => array(
					                                 
					                                  '1' => 'Consolidado',
					                                   '2' => 'Retiro en Almacen',
					                                   '3' => 'Retiro en Acacias',
					                                   '4' => 'Solo Documento ',
					                                   '5' => 'Encomienda',
					                                 ),)); ?> 
					<?php echo $this->Form->input('pago', array('class' => 'form-control', 'empty' => '(seleccione)',
					                        'type' => 'select',
					                         'label'=>array('text' => 'Tipo de Pago'),
					                            'options' => array(
					                                 
					                                  'bolivares' => 'BOLIVARES',
					                                  'divisas' => 'DIVISAS',
					                                   'taquilla' => 'TAQUILLA',
					                                   'transferencias' => 'TRANSFERENCIAS',
					                                   'mercantil' => 'MERCANTIL',
					                                   'custodio' => 'CUSTODIO',
					                                   'tarjeta' => 'TARJETA',
					                                   'contraentrega' => 'CONTRA ENTREGA',

					                                 ),)); ?> 
				
				
				<?PHP	echo $this->Form->input('comentario', array('class' => 'form-control', 'label' => 'Comentario :', 'placeholder' => 'Indicar un breve comentario aqui...', 'rows' => "05", 'cols' => "20"));?>
	
		
	



		<center> <h4> ARTICULOS AGREGADOS AL PEDIDO</h4></center>
			<br>
		<?php foreach($orden_item as $item): ?>

	<div class="row" id="row-<?php echo $item['Pedido']['id']; ?>">
	   
		<div class="col col-sm-1">
		<strong>	-CODIGO:	</strong><?php echo $item['Bodegaped']['CODIGO']; ?>
		</div>

		<div class="col col-sm-4">
			<strong>
			-DESCRIPCION:</strong>	<?php echo $this->Html->link($item['Bodegaped']['DESCRIPCION'], array('controller' => 'bodegapeds', 'action' => 'view2', $item['Bodegaped']['id'])); ?>
			
		</div>

		<div class="col col-sm-1" id="price-<?php echo $item['Pedido']['id']; ?>">
			<strong>-PRECIO:</strong> $<?php echo $item['Bodegaped']['VENTA']; ?>

		</div>

		<div class="col col-sm-1 col-xs-3" >
			
    	<strong>CANTIDAD:</strong> <?php echo $this->Form->input($item['Pedido']['id'], array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlenght' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['Pedido']['id'], 'value' => $item['Pedido']['cantidad'])); ?>

		</div>
		
		<br>
		<br>
		<br>
		<div class="col col-sm-2">
			<strong>	-DECUENTO MAX:	</strong><?php echo $item['Bodegaped']['Articulo']['DESCUENTO']; ?>%
		</div>

		<div class="col col-sm-1 text-align: center">
			<strong>	-%:</strong>  	<?php echo $item['Pedido']['porcentaje']; ?>
			<div class="btn-group">
			  

			 <button type="button" lavel ="%" data-toggle="dropdown" title="Cambiar % de Articulo">
			    <?php echo __(''); ?> <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><H3>

						
				
					<?php
				echo $this->Html->link("0", array('controller' => 'pedidos', 'action'=>'opc0', $item['Pedido']['id'])); 	?>/

				<?php	 
				 echo $this->Html->link("1", array('controller' => 'pedidos', 'action'=>'opc1', $item['Pedido']['id'])); ?>/
				<?php	   echo $this->Html->link("2", array('controller' => 'pedidos','action'=>'opc2', $item['Pedido']['id'])); ?>/
				<?php	    echo $this->Html->link("3", array('controller' => 'pedidos','action'=>'opc3', $item['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("4", array('controller' => 'pedidos','action'=>'opc4', $item['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("5", array('controller' => 'pedidos','action'=>'opc5', $item['Pedido']['id'])); ?>/
				<?php	      echo $this->Html->link("6", array('controller' => 'pedidos','action'=>'opc6', $item['Pedido']['id'])); ?>/
				<?php	       echo $this->Html->link("7", array('controller' => 'pedidos', 'action'=>'opc7', $item['Pedido']['id'])); ?>/
				<?php		   echo $this->Html->link("8", array('controller' => 'pedidos','action'=>'opc8', $item['Pedido']['id'])); ?>/
				<?php		    echo $this->Html->link("9", array('controller' => 'pedidos','action'=>'opc9', $item['Pedido']['id'])); ?>/
				<?php		     echo $this->Html->link("10", array('controller' => 'pedidos','action'=>'opc10', $item['Pedido']['id'])); ?>/
				<?php		      echo $this->Html->link("11", array('controller' => 'pedidos','action'=>'opc11', $item['Pedido']['id'])); ?>/
				<?php	  echo $this->Html->link("12", array('controller' => 'pedidos', 'action'=>'opc12', $item['Pedido']['id'])); ?>/
				<?php	   echo $this->Html->link("13", array('controller' => 'pedidos','action'=>'opc13', $item['Pedido']['id'])); ?>/
				<?php	    echo $this->Html->link("14", array('controller' => 'pedidos','action'=>'opc14', $item['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("15", array('controller' => 'pedidos','action'=>'opc15', $item['Pedido']['id'])); ?>/
				<?php	     echo $this->Html->link("16", array('controller' => 'pedidos','action'=>'opc16', $item['Pedido']['id'])); ?>/
				<?php	      echo $this->Html->link("17", array('controller' => 'pedidos','action'=>'opc17', $item['Pedido']['id'])); ?>/
				<?php	       echo $this->Html->link("18", array('controller' => 'pedidos', 'action'=>'opc18', $item['Pedido']['id'])); ?>/
				<?php		   echo $this->Html->link("19", array('controller' => 'pedidos','action'=>'opc19', $item['Pedido']['id'])); ?>/
				<?php		    echo $this->Html->link("20", array('controller' => 'pedidos','action'=>'opc20', $item['Pedido']['id'])); ?>/
				<?php		     echo $this->Html->link("21", array('controller' => 'pedidos','action'=>'opc21', $item['Pedido']['id'])); ?>/
				<?php		      echo $this->Html->link("22", array('controller' => 'pedidos','action'=>'opc22', $item['Pedido']['id'])); ?>/
				<?php		    echo $this->Html->link("23", array('controller' => 'pedidos','action'=>'opc23', $item['Pedido']['id'])); ?>/
				<?php		     echo $this->Html->link("24", array('controller' => 'pedidos','action'=>'opc24', $item['Pedido']['id'])); ?>/
				<?php		      echo $this->Html->link("25", array('controller' => 'pedidos','action'=>'opc25', $item['Pedido']['id'])); ?>/
					
			
			</H3>

			</li>
				
			  </ul>
			  
			</div>
		</div>

		<div class="col col-sm-2" style="background-color: none;" id= "subtotal_<?php echo $item['Pedido']['id']; ?>">
	<strong>-SUBTOTAL: </strong><?php echo number_format($item['Pedido']['subtotal'], 2, '.', ''); ?>
		</div>

	<div class="col col-sm-2" style="background-color: none;" >
	<strong>-Nº Pedido: </strong> 	<?php echo $item['Pedido']['norden']; ?>
	
	
		</div>

		<div class="col col-sm-2">
			<strong>	-ELIMINAR:	</strong><?php
			echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', '#', array('escapeTitle' => false, 'title' => 'Eliminar item', 'id' => $item['Pedido']['id'], 'class' => 'remove'));
			?>
		</div>

	</div>
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
		<h2>	$ <?php echo $mostrar_total_pedidos; ?></h2>
		
</span>

				<br />
				<br />
               <?php echo $this->Form->input('total',array('type' => 'hidden', 'value' => $mostrar_total_pedidos)); ?>
                
                
			</center>
	</form> 
<div>
                    
       <div class="pull-left tr">
         <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'ordens', 'action' => 'index3')); ?>
          </div> 
        </div>
	  
<div class="pull-right tr">

	<?php echo $this->Form->end(array('label' => 'Procesar Orden', 'class' => 'btn btn-success')); ?>
</div>


</div>

 
           

		


