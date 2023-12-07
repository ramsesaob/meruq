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
				<td> <h4><em><strong><?php echo __('Datos del Pedido Nº'); ?> <?php echo h($orden['Orden']['numpedido']); ?></strong></em></h4></td> 
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
				<strong>*	CODIGO:	</strong><?php echo $item['Bodegaped']['CODIGO']; ?>
			</div>

			<div class="col col-sm-4">
				
				<strong>*DESCRIPCION:</strong>	<?php echo $item['Bodegaped']['DESCRIPCION']; ?>
			</div>

			<div class="col col-sm-1" id="price-<?php echo $item['Pedido']['id']; ?>">
				<strong>* PRECIO:</strong> $<?php echo $item['Bodegaped']['VENTA']; ?>
			</div>

		<div class="col col-sm-1">
			<strong>*	CANTIDAD:</strong> <?php echo $item['Pedido']['cantidad']; ?>
		</div>

		<div class="col col-sm-1 text-align: center">
			<strong>*	%:</strong>  	<?php echo $item['Pedido']['porcentaje']; ?>
		</div>
		
		<div class="col col-sm-2" style="background-color: none;" id="subtotal_<?php echo $item['Pedido']['id']; ?>">
			<strong>* SUBTOTAL: </strong><?php echo number_format($item['Pedido']['subtotal'], 2, '.', ''); ?>
		</div>
		
		
		<div class="col col-sm-2" style="background-color: none;" id="subtotal_<?php echo $item['Pedido']['id']; ?>">
			<strong>* Norden: </strong><?php echo ($item['Pedido']['norden']); ?>
		</div>
	</div>
	</div>

	</br>
	<br>


<?php endforeach; ?>

			<p>
				<center>
				<span class="total"><h2>Total Orden:</h2></span>
				<span id="total" class="total">
				<h1>	$ <?php echo $mostrar_total_pedidos; ?></h1>
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

 
           

		


