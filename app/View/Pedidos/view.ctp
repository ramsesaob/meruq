<?php
//debug($pedidos);
?>
<?php
//var_dump($pedidos);
?>


<?php echo $this->Html->script(array('cart.js', 'jquery.animate-colors'), array('inline' => false)); ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'pedidos', 'action' => 'recalcular'))); ?>
<strong>PROGESO DEL PEDIDO: PASO 02 INGRESAR CANTIDADES</strong>
<div class="progress">
  <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">2/4</div>
</div>
<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'bodegapeds', 'action' => 'search')); ?></div> 
            </div>
            <div class="pull-right tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-right" target="_blank" >
             <?php echo $this->Html->link('SIGUIENTE', array('controller' => 'ordens', 'action' => 'add'), array('confirm' => __('Recuerde haber Recalculado su pedido, ¿desea continuar?'), 'class' => 'tip', 'escape'   => false, 'title' => 'SIGUIENTE')); ?>
         </div>
            </div>
                    </ol> 
                   
            </section>

<hr>

<?php $tabindex = 1; ?>


<?php foreach($pedidos as $pedido): ?>
	

		<div class="row" id="row-<?php echo $pedido['Pedido']['id']; ?>">
		   
			

			<div class="row col col-sm-3 col-md-3 lg-1.3 ">
				<h4 class="text-center"><?php echo $this->Html->link($pedido['Bodegaped']['DESCRIPCION'], array('controller' => 'bodegapeds', 'action' => 'view2', $pedido['Bodegaped']['id'])); ?></h4>
				
			</div>
			<div class="row col col-sm-1 col-md-1 lg-1.3">
				<strong>	-CODIGO:	</strong><?php echo $pedido['Bodegaped']['CODIGO']; ?>
			</div>
			
			<div class="row col col-sm-1 col-md-1 lg-1.3" id="price-<?php echo $pedido['Pedido']['id']; ?>">

					    <strong>-PRECIO ORG:</strong>
					    <?php echo number_format($pedido['Pedido']['precio_org'], 2, ',', ''); ?>
			    
			</div>
			

			<div class="row mx-1  px-1 col col-sm-1  col-md-1 lg-1.3" >
				
	    		<strong>-CANTIDAD:</strong> <?php echo $this->Form->input($pedido['Pedido']['id'], array('div' => false, 'class' => 'numeric form-control-lg input-small', 'label' => false, 'size' => 2, 'maxlenght' => 2, 'tabindex' => $tabindex++, 'data-id' => $pedido['Pedido']['id'], 'value' => $pedido['Pedido']['cantidad'])); ?> unds

			</div>
			
			
			<div class=" row col col-sm-1  col-md-1 lg-1.3">
	   			 <strong>-PRECIO DESC:</strong>
	   			 <?php echo $this->Form->input('preciodesc.'.$pedido['Pedido']['id'], array(
			        'div' => false,
			        'class' => 'form-control-lg input-small ',
			        'label' => false,
			        'size' => 2,
			    //    'maxlength' => 6,
			        'tabindex' => $tabindex++,
			        'data-id' => $pedido['Pedido']['id'],
			        'value' =>  number_format($pedido['Pedido']['preciodesc'], 3, '.', '')
			    )); ?>$
	     
			</div>
		
			<div class="row py-1 col col-sm-1 col-md-1 lg-1.3">
				<strong>	-DECUENTO MAX:	</strong><?php echo $pedido['Bodegaped']['Articulo']['DESCUENTO']; ?>%
			</div>

			

			
				 <div class="row col col-sm-1 col-md-1 lg-1.3 text-align: center">
					<strong>	-%:</strong>  	<?php echo $pedido['Pedido']['porcentaje']; ?>
				<div class="btn-group col-md-1.3">
				  

				 <button type="button" lavel ="%" data-toggle="dropdown" title="Cambiar % de Articulo">
				    <?php echo __(''); ?> <span class="caret"></span>
				 </button>
				  <ul class="dropdown-menu col-md-1.3" role="menu">
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
			<div class="row col col-sm-1 col-md-1 lg-1.3" style="background-color: none;" id= "subtotal_<?php echo $pedido['Pedido']['id']; ?>">
				<strong>-SUBTOTAL: </strong>$<?php echo number_format($pedido['Pedido']['subtotal'], 2, ',', ''); ?>
			</div>
				<div class="row col col-sm-2 col-md-2 col-lg-1.3 text-right">
				<strong>	-ELIMINAR:	</strong><?php
				echo $this->Html->link('<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>', '#', array('escapeTitle' => false, 'title' => 'Eliminar item', 'id' => $pedido['Pedido']['id'], 'class' => 'remove col-md-1.3'));
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

		<?php echo $this->Html->link('Quitar pedidos', array('controller' => 'pedidos', 'action' => 'quitar'), array('class' => 'btn btn-danger', 'confirm' => 'Está seguro de quitar todos los pedidos?')); ?>
		
		&nbsp;&nbsp;

		<?php echo $this->Form->button('Recalcular', array('class' => 'btn btn-warning fa fa-dollar fa-1x fa-lg', 'escape' => false, 'name' => 'recalcular', 'value' => 'recalcular')); ?>
		  
		<br><br><br><br>
		<h3><span class="total">Total Orden:</span></h3>
		<span id="total" class="total">
		<h2>	$ <?php echo number_format($total_pedidos, 2, ',', ''); ?></h2>
		

	
		</span>

		<br><br>
	
		</div>

	</div>

</div>

	<section class="content-header"> 
                  
<ol class="breadcrumb text-right">
                       
                <div class="pull-left tr">
                 <div class="active btn btn-primarybtn btn-light    glyphicon glyphicon-arrow-left" target="_blank" >
        
             <?php echo $this->Html->link('REGRESAR', array('controller' => 'bodegapeds', 'action' => 'search')); ?></div> 
            </div>
            <div class="pull-right tr">
                 <div class="active btn btn-primarybtn btn-light  glyphicon glyphicon-arrow-right" target="_blank" >
              <?php echo $this->Html->link('SIGUIENTE', array('controller' => 'ordens', 'action' => 'add'), array('confirm' => __('Recuerde haber Recalculado su pedido, ¿desea continuar?'), 'class' => 'tip', 'escape'   => false, 'title' => 'SIGUIENTE')); ?>

         </div>
        
            </div>
                    </ol> 
                   
            </section>

   