<?php
 //debug($clientes);
?>

<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

-->
<?php echo $this->Html->script(array('cart.js',  'jquery.animate-colors.js', 'picker.js'), array('inline' => false)); ?>
<?php echo $this->Form->create('Orden'); ?> 
     

<strong>PROGESO DEL PEDIDO: PASO 03 <u>DETALLES DEL PEDIDO</u></strong>
<div class="progress">
  <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">3/4</div>
</div>

	<section class="content-header"> 
                  
		<ol class="breadcrumb text-right">
                       
       <div class="pull-left tr">
         <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'pedidos', 'action' => 'view')); ?>
          </div> 
        </div>
		 </ol>       
  </section>

			<div>
     	<table>
     		<td>
     			<tr></tr>
     		</td>
     	</table>
     </div>
		  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>






				 


		
<br>
<section class="content-header">
		
			<div class="ordens form">
		<form>
			
		
							<?PHP echo $this->Form->input('user_id', array('class' => 'form-control', 'label' => 'Vendedor')); ?>

				    	<?php
									echo $this->Form->input('cliente_id', array(
									    'class' => 'select selectpicker form-control ',
									   'value' => ['cliente_id'],
									  //  'value' => 'cliente_id',
									    'data-live-search' => true,
									    'data-tokens' => 'cliente_id',
									    'label' => 'Seleccione el Cliente',
									    'empty' => '(seleccione)',
									    'data-placeholder' => 'Buscar cliente',
									    'id' => 'cliente_id',
									    'order' => array('Cliente.DESCRIPCION' => 'asc'),
									    //'data-id' => ['Orden']['cliente_id']
									    
									));
									?>

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
				<strong>* PRECIO:</strong> $<?php echo number_format($item['Pedido']['preciodesc'], 2, ',', ''); ?>
			</div>

		<div class="col col-sm-1">
			<strong>*	CANTIDAD:</strong> <?php echo $item['Pedido']['cantidad']; ?>
		</div>

		<div class="col col-sm-1 text-align: center">
			<strong>*	%:</strong>  	<?php echo $item['Pedido']['porcentaje']; ?>
		</div>
		
		<div class="col col-sm-2" style="background-color: none;" id="subtotal_<?php echo $item['Pedido']['id']; ?>">
			<strong>* SUBTOTAL: </strong><?php echo number_format($item['Pedido']['subtotal'], 2, ',', ''); ?>
		</div>

	</div>

	</br>
	<br>


<?php endforeach; ?>

			<p>
				<center>
				<span class="total"><h2>Total Orden + IVA:</h2></span>
				<span id="total" class="total">
				<h1>	$ <?php echo number_format($total, 2, ',', ''); ?></h1>
				</span>
				<br />
				<br />
               <?php echo $this->Form->input('total',array('type' => 'hidden', 'value' => $total)); ?>
               <?php echo $this->Form->input('iva',array('type' => 'hidden', 'value' => $iva)); ?>
               <?php echo $this->Form->input('subtotal',array('type' => 'hidden', 'value' => $mostrar_total_pedidos)); ?>
                
                
			</center>
	</form> 
<div>
                    
       <div class="pull-left tr">
         <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'pedidos', 'action' => 'view')); ?>
          </div> 
        </div>
	  
<div class="pull-right tr">

	<?php echo $this->Form->end(array('label' => 'Procesar Orden', 'class' => 'btn btn-success')); ?>
</div>


</div>

 
           

		


